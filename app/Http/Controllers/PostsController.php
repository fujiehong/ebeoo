<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostsController extends Controller
{
    //
    public function index(Post $post)
    {
        $posts=$post->orderBy('rank','desc')->orderBy('created_at','desc')->where('status',true)->paginate(6);
        return view('posts.index',compact('posts'));
    }
    public function show(Post $post)
    {
        return view('posts.show',compact('post'));
    }
}
