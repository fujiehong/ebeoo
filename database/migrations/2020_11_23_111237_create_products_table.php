<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedTinyInteger('status')->default(1)->comment('产品状态');
            $table->unsignedInteger('stock')->default(0)->comment('产品库存');
            $table->integer('sales')->default(0)->comment('产品销量');
            $table->integer('rank')->default(0)->comment('产品排序');
            $table->string('title',64)->default(' ')->comment('产品标题');
            $table->string('note',32)->default(' ')->comment('产品注释');
            $table->string('image')->nullable()->comment('图片地址');
            $table->string('brand')->nullable()->comment('产品品牌');
            $table->string('summary')->comment('产品摘要');
            $table->text('description')->comment('产品描述');
            $table->text('specification')->comment('产品规格');
            $table->string('dimension')->comment('产品尺寸');
            $table->string('shipment')->comment('航运信息');
            $table->integer('category_id')->unsigned()->index();
            $table->string('subject',32)->default(' ')->comment('产品注释');
            $table->string('interest')->comment('产品嗜好');
            $table->string('region',32)->comment('销售地区');
            $table->string('code',32)->comment('产品条码');
            $table->string('label',32)->comment('产品标签');
            $table->string('ageRange')->comment('年龄范围');
            $table->decimal('original_price',16,2)->default(0.00)->comment('产品原价');
            $table->decimal('special_price',16,2)->default(0.00)->comment('产品特价');
            $table->text('link')->comment('产品链接');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
}
