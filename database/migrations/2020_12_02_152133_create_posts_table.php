<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->bigIncrements('id')->comment('发布id');
            $table->text('imgurl')->comment('发布图片');
            $table->string('label',32)->comment('发布标签');
            $table->string('title',32)->comment('发布标题');
            $table->string('note',32)->comment('发布笔记');
            $table->text('description')->comment('发布描述');
            $table->string('opentype',32)->comment('跳转方式');
            $table->text('openurl')->comment('跳转链接');
            $table->unsignedTinyInteger('status')->default(true)->comment('发布状态');
            $table->unsignedSmallInteger('rank')->comment('发布排序');
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
        Schema::dropIfExists('posts');
    }
}
