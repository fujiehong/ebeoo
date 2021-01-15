<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBlogRepliesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('blog_replies', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('blog_id')->unsigned()->default(0)->index();
            $table->bigInteger('user_id')->unsigned()->default(0)->index();
            $table->text('content');
            $table->integer('last_id')->unsigned()->nullable();
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
        Schema::dropIfExists('blog_replies');
    }
}
