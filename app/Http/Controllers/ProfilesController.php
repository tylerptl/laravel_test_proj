<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class ProfilesController extends Controller
{
    //
    public function index(User $user)
    {
//        $user = User::findOrFail($user);
//        dd($user);
//        $user = User::findOrFail($user); Passing in \App\User lets laravel find/fail the user search for us
        return view('profiles.index', compact('user'));
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
            auth()->$user->profile->update($data);

            return redirect("/profile/{$user->id}");
            dd($data);
    }
}
