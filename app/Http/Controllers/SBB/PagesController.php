<?php

namespace App\Http\Controllers\SBB;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function root(Product $product)
    {
        $products=$product->where('category_id',1)->take(4)->get();
        $cubes=$product->take(8)->get();

        return view('sbb.pages.root',compact('products','cubes'));
    }

    public function partners()
    {
        return view('sbb.pages.partners');
    }
    public function club()
    {
        return view('sbb.pages.club');
    }
}
