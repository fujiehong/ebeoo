<?php

namespace App\Observers;

use App\Jobs\TranslateSlug;
use App\Models\Topic;
use App\Handlers\SlugTranslateHandler;
use Illuminate\Support\Facades\DB;

// creating, created, updating, updated, saving,
// saved,  deleting, deleted, restoring, restored

class TopicObserver
{
    public function saving(Topic $topic)
    {
        //使用HTMLPurifier插件开始过滤话题内容。
        $topic->body = clean($topic->body, 'user_topic_body');

        $topic->excerpt = make_excerpt($topic->body);
        // 如 slug 字段无内容，即使用翻译器对 title 进行翻译

    }
    public function saved(Topic $topic)
    {
        if ( ! $topic->slug) {
            //未使用队列方式
            //$topic->slug = app(SlugTranslateHandler::class)->translate($topic->title);

            //使用队列方式
            dispatch(new TranslateSlug($topic));

        }

    }

    public function creating(Topic $topic)
    {
        //
    }

    public function deleted(Topic $topic)
    {
        DB::table('replies')->where('topic_id', $topic->id)->delete();
    }
}
