<?php

namespace App\Http\Controllers\SBB;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\ProductCategory;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    public function index(Product $product)
    {
        $products=$product->with( 'category')->paginate(8);
        $productCategory='';

        return view('sbb.products.index',compact('products','productCategory'));
    }
    public function show(Product $product)
    {


        $productCategory=ProductCategory::where('id',$product->category_id)->first();

        $products=$product->where('category_id',$product->category_id)->take(4)->get();


        return view('sbb.products.show',compact('product','productCategory','products'));
    }
}
