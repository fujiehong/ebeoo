


<li class="clearfix">
    <div class="row">
        <div class="col-lg-1 col-5 text-center">
            <div class="icon-circle">
                <a href="{{ route('users.show', $notification->data['user_id']) }}">
                    <img class="img-thumbnail mr-3" alt="{{ $notification->data['user_name'] }}" src="{{ $notification->data['user_avatar'] }}"  />

                </a>

            </div>

        </div>
        <div class="col-lg-11 col-7">
            <span class="float-right"><i class="fa fa-clock-o"></i>
        {{ $notification->created_at->diffForHumans() }}</span>
            <a href="{{ route('users.show', $notification->data['user_id']) }}"> {{ $notification->data['user_name'] }} </a>
            评论了 <a  href="{{ $notification->data['topic_link'] }}">{{ $notification->data['topic_title'] }}</a>

            {!! $notification->data['reply_content'] !!}

        </div>
    </div>
<hr>
</li>


