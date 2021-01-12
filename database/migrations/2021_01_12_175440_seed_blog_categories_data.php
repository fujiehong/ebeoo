<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class SeedBlogCategoriesData extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $categories = [
            [
                'name'        => 'animals',
                'description' => 'animals',
            ],
            [
                'name'        => 'art',
                'description' => 'art',
            ],
            [
                'name'        => 'bluetooth upgrade kit',
                'description' => 'bluetooth upgrade kit',
            ],
            [
                'name'        => 'crafts',
                'description' => 'crafts',
            ],
            [
                'name'        => 'gears go kit',
                'description' => 'gears go kit',
            ],
            [
                'name'        => 'lego',
                'description' => 'lego',
            ],

            [
                'name'        => 'mechs move kit',
                'description' => 'mechs move kit',
            ],
            [
                'name'        => 'robots roll kit',
                'description' => 'robots roll kit',
            ],
            [
                'name'        => 'vehicles',
                'description' => 'vehicles',
            ],
        ];

        DB::table('blog_categories')->insert($categories);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::table('blog_categories')->truncate();
    }
}
