<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\TopicResource;
use App\Models\Topic;
use Illuminate\Http\Request;

class TopicsController extends Controller
{
    //
    public function index(Request $request, Topic $topic)
    {
        $topics = $topic->withOrder($request->order)
            ->with('user', 'category')  // 预加载防止 N+1 问题
            ->paginate(6);
        return TopicResource::collection($topics);
    }
}
