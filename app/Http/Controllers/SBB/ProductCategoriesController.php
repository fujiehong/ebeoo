<?php

namespace App\Http\Controllers\SBB;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\ProductCategory;
use function GuzzleHttp\Promise\all;
use Illuminate\Http\Request;

class ProductCategoriesController extends Controller
{
    //按商品分类查询商品
    public function show(ProductCategory $productCategory){
        // 读取分类 ID 关联的商品，并按每 8 条分页
        $products=Product::where('category_id',$productCategory->id)->where('status','1')->paginate(8);


        // 传参变量话题和分类到模板中
        return view('sbb.products.index',compact('products','productCategory'));
    }
    //商品分类列表
    public function collections(ProductCategory $productCategory){
        $productCategory->with('products')->where('status','1')->get();
        return view('sbb.products.collection');

    }

    //cubes分类下的所有商品。
    public function cubes(ProductCategory $productCategory){
        // 读取分类 ID 关联的商品，并按每 8 条分页
        $products=Product::where('category_id',3)->where('status','1')->paginate(8);
        // 传参变量话题和分类到模板中
        return view('sbb.products.index',compact('products','productCategory'));
    }
}
