<?php

namespace App\Http\Controllers\SBB;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\ProductCategory;
use function GuzzleHttp\Promise\all;
use Illuminate\Http\Request;

class ProductCategoriesController extends Controller
{
    public function show(ProductCategory $productCategory){
        // 读取分类 ID 关联的商品，并按每 8 条分页
        $products=Product::where('category_id',$productCategory->id)->paginate(8);


        // 传参变量话题和分类到模板中
        return view('sbb.products.index',compact('products','productCategory'));
    }

    public function collections(ProductCategory $productCategory){
        $productCategory->with('products')->get();
        return view('sbb.products.collection');

    }


    public function cubes(ProductCategory $productCategory){
        // 读取分类 ID 关联的商品，并按每 8 条分页
        $products=Product::where('category_id',3)->paginate(8);
        // 传参变量话题和分类到模板中
        return view('sbb.products.index',compact('products','productCategory'));
    }
}
