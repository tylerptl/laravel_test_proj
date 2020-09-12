<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;

class PostsController extends Controller
{
    public function create(){
        return view('posts.create');

    }

    //

    public function store(){

        $data = request()->validate([
            'caption' => 'required',
            'image'   =>  'required|image'
        ]);

       auth()->user()->posts()->create($data);

//        \App\Post::create($data);

//
        $post = new \App\Post();
        $post->caption = $data['caption'];
        $post->image = $data['image'];


//        Post::create([$data]);
        dd(request()->all());
//        dd($data);
    }
}
