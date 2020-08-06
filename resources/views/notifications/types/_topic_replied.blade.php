
<li>
    <a href="{{ route('users.show', $notification->data['user_id']) }}">
        <img class="media-object img-thumbnail mr-3" alt="{{ $notification->data['user_name'] }}" src="{{ $notification->data['user_avatar'] }}" style="width:48px;height:48px;" />{{ $notification->data['user_name'] }}

    </a>

    评论了
    <a href="{{ $notification->data['topic_link'] }}">{{ $notification->data['topic_title'] }}</a>
    {{-- 回复删除按钮 --}}
    <span class="float-right" title="{{ $notification->created_at }}">
        <i class="fa fa-clock-o"></i>
        {{ $notification->created_at->diffForHumans() }}
    </span>

        {!! $notification->data['reply_content'] !!}

</li>


