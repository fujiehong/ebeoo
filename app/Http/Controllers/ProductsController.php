<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    public function index(Product $product)
    {
        $products=$product->with( 'category')->paginate(9);

        return view('products.index',compact('products'));
    }
    public function show(Product $product)
    {
        return view('products.show',compact('product'));
    }
}
