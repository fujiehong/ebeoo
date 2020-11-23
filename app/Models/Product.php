<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    //status:产品状态
    //stock:产品库存
    //sales:产品销量
    //rank:产品排序
    //title:产品标题
    //note:产品注释
    //image:产品图片地址
    //brand:产品品牌
    //summary:产品摘要
    //description:产品描述
    //specification:产品规格
    //dimension:产品尺寸
    //shipment:航运信息
    //category_id:产品分类id
    //subject:商品主题
    //interest:产品嗜好
    //region:销售地区
    //code:产品条码
    //label:产品标签
    //ageRange:年龄范围
    //original_price:产品原价（元）
    //special_price:产品特价（元）
    //link:产品链接
    //product_id:商品id


    protected $fillable = ['status','stock','rank','title','note','image','brand', 'summary',
        'description','specification','dimension','shipment','category_id','subject', 'interest',
        'region','code','label','ageRange','original_price','special_price','link'];

    //一个商品属于一个分类
    public function categories(){
        return $this->belongsTo(ProductCategory::class);

    }


}
