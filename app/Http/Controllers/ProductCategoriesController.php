<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\ProductCategory;
use Illuminate\Http\Request;

class ProductCategoriesController extends Controller
{
    public function show(ProductCategory $productCategory){
        // 读取分类 ID 关联的商品，并按每 8 条分页
        $product=Product::where('cagetory_id',$productCategory->id)->paginate(8);
        // 传参变量话题和分类到模板中
        return view('products.index',compact('products','productCategory'));
    }
}
