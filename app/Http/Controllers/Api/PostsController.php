<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\PostResource;
use App\Models\Post;
use Illuminate\Http\Request;

class PostsController extends Controller
{
    public function index(Post $post)
    {
        $query=$post->query();
       $posts=$query->orderBy('rank','desc')->orderByDesc('created_at')->where('status',true)->paginate(6);
        return PostResource::collection($posts);

    }
}
