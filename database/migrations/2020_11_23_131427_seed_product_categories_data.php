<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class SeedProductCategoriesData extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $product_category=[
            [
                'name'=>'电动功能车套装',
                'description'=>'12合1电动功能车套装'
            ],
            [
                'name'=>'奇思妙想套装',
                'description'=>'6合1奇思妙想套装'

            ],
            [
                'name'=>'机械蜘蛛',
                'description'=>'机械蜘蛛'
            ]
        ];
        DB::table('product_categories')->insert($product_category);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB:table('product_categories')->truncate();
    }
}
