<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Intervention\Image\Facades\Image;

class ProfilesController extends Controller
{
    //
    public function index(User $user)
    {
        // Does the authenticated users followers contain the user that has been passed in?
        $follows = (auth()->user() ? auth()->user()->following->contains($user->id) : false);
        $postCount = Cache::remember(
            'count.posts.' . $user->id,
            now()->addSeconds(30),
            function () use ($user){
                return $user->posts->count();
        });
        $followersCount = Cache::remember(
            'count.followers.'. $user->id,
            now()->addSeconds(30),
            function () use ($user){
                return $user->profile->followers->count();
            });
        $followingCount = Cache::remember(
            'count.following.' . $user->id,
            now()->addSeconds(30),
            function () use ($user){
                return $user->following->count();
            });
//        $user = User::findOrFail($user);
//        dd($user);
//        $user = User::findOrFail($user); Passing in \App\User lets laravel find/fail the user search for us
//        dd($follows);
        return view('profiles.index', compact('user','follows','postCount','followersCount','followingCount'));
    }

    public function edit(User $user){
        $this->authorize('update', $user->profile); // Authorize an update on this user's profile.
        return view('profiles.edit', compact('user'));
    }

    public function update(User $user){


        $this->authorize('update', $user->profile);

            $data = request()->validate([
                'title'=>  'required',
                'description'=> 'required',
                'url'=> 'url',  //Check validation docs
                'image'=>  '',
            ]);
        if (request('image')){
            $imagePath = request('image')->store('profile', 'public');

            $image = Image::make(public_path("storage/{$imagePath}"))->fit(1000,1000);
            $image->save();
            $imageArray = ['image' => $imagePath];
        }

        // This will append elements of 2nd array to 1st -
        // if none exists then it effectively selects on or the other
        auth()->user()->profile->update(array_merge(
            $data,
            $imageArray ?? []
        ));

        return redirect("/profile/{$user->id}");
    }
}
