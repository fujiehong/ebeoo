<?php

namespace App\Models;

class Topic extends Model
{
    //user_id —— 文章的作者
    //last_reply_user_id —— 最后回复的用户 ID
    //order —— 文章排序
    //reply_count —— 回复数量
    //view_count —— 查看数量
    //excerpt  --文章摘要，SEO 优化时使用
    //slug--SEO 友好的 URI

    protected $fillable = ['title', 'body',  'category_id', 'excerpt', 'slug'];
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function link($params = [])
    {
        return route('topics.show', array_merge([$this->id, $this->slug], $params));
    }
}
