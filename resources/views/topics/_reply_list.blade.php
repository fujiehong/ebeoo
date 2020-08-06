<div class="comments">

    <ul class="comments__list">

        @foreach ($replies as $index => $reply)


        <li class=" media" name="reply{{ $reply->id }}" id="reply{{ $reply->id }}">
            <div class="comment">
                <a href="{{ route('users.show', [$reply->user_id]) }}">
                    <div class="comment__avatar">
                        <img alt="{{ $reply->user->name }}"  src="{{ $reply->user->avatar }}" />
                    </div>
                </a>
                <div class="comment__body">
                    <h5 class="type--fine-print">{{$reply->user->name}}</h5>

                    <div class="comment__meta">
                        <span title="{{ $reply->created_at }}">{{ $reply->created_at->diffForHumans() }}</span>
                        <a href="#">回复</a>
                        @can('destroy', $reply)
                        <span class="float-right " title="删除回复">
                            <form action="{{ route('replies.destroy', $reply->id) }}"
                                  onsubmit="return confirm('确定要删除此评论？');"
                                  method="post">
                                {{ csrf_field() }}
                                {{ method_field('DELETE') }}
                              <button type="submit" class="btn btn--icon fa fa-trash-o">
                                <span>删除</span>
                              </button>
                            </form>

                        </span>
                        @endcan
                    </div>
                    <p>
                        {!! $reply->content !!}
                    </p>



                </div>
            </div>
            <!--end comment-->
        </li>
        @endforeach
    </ul>
    <div class="pagination">
        <ol>
            {!! $replies->appends(Request::except('page'))->render() !!}
        </ol>
    </div>
</div>
<!--end comments-->
