<?php

namespace App\Http\Controllers\SBB;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use Illuminate\Http\Request;

class BlogsController extends Controller
{
    public function show(Request $request,Blog $blog)
    {
        if ( ! empty($blog->slug) && $blog->slug != $request->slug) {

            return redirect($blog->link(), 301);
        }

        return view('sbb.blogs.show', compact('blog'));
    }
}
