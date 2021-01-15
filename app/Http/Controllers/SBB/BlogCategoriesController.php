<?php

namespace App\Http\Controllers\SBB;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\BlogCategory;
use Illuminate\Http\Request;

class BlogCategoriesController extends Controller
{
    public function show(BlogCategory $blogCategory)
    {
        $blogs=Blog::where('category_id',$blogCategory->id)->paginate(9);
        $blogcategories=BlogCategory::all();



        return view('sbb.blogs.index',compact('blogs','blogCategory'));
    }
    public function all(Blog $blog)
    {
        $blogs=$blog->paginate(9);
        $blogCategory='';

        return view('sbb.blogs.index',compact('blogs','blogCategory'));
    }
}
