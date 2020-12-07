<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\ProductResource;
use App\Models\Product;
use Illuminate\Http\Request;
use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\QueryBuilder;

class ProductsController extends Controller
{
    public function index(Product $product)
    {
         $products=$product->query()->with('category')->paginate(6);

        return ProductResource::collection($products);

    }
    public function show(Product $product)
    {


        //$res=$product->query()->with('category')->findOrFail($product->id);

        return new ProductResource($product);

    }
    //未使用。因为正式环境未能有内存空间安装QueryBuilder。
    public function indexQueryBuilder(Product $product)
    {

        $products=QueryBuilder::for(Product::class)
            ->allowedIncludes('category')
            ->allowedFilters(
                [
                    'title',
                    AllowedFilter::exact('category_id'),
                ]
            )->orderBy('created_at')->paginate();

        return ProductResource::collection($products);
    }
    //未使用。因为正式环境未能有内存空间安装QueryBuilder。
    public function showQueryBuilder($productId)
    {
        $product=QueryBuilder::for(Product::class)->allowedIncludes('category')->findOrFail($productId);
        return new ProductResource($product);

    }
}
