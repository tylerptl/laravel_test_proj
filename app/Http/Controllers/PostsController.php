<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use Intervention\Image\Facades\Image;

class PostsController extends Controller
{

    public function __construct(){
        $this -> middleware('auth');
}

    public function index(){
        $users = auth()->user()->following()->pluck('profiles.user_id');
        $posts = Post::whereIn('user_id', $users)->with('user')->latest()->paginate(4);
//        dd($posts);
        //        dd($users);

    return view('posts.index', compact('posts'));


    }


    public function create(){
        return view('posts.create');

    }

    //

    public function store(){

        $data = request()->validate([
            'caption' => 'required',
            'image'   =>  'required|image'
        ]);

//       auth()->user()->posts()->create($data);
        $imagePath = request('image')->store('uploads', 'public');

        $image = Image::make(public_path("storage/{$imagePath}"))->fit(1200,1200);
        $image->save();
        auth()->user()->posts()->create([
            'caption' => $data['caption'],
            'image' =>  $imagePath,
        ]);

        return redirect('/profile/'. auth()->user()->id);
//        \App\Post::create($data);

        $post = new \App\Post();
        $post->caption = $data['caption'];
        $post->image = $data['image'];


//        Post::create([$data]);
        dd(request()->all());
//        dd($data);
    }

    public function show(\App\Post $post){
       return view('posts.show', compact('post'));
    }
}
