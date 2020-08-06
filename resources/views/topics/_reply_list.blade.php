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
                        <span class="meta float-right " title="删除回复">
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
                    </div>
                    <p>
                        {!! $reply->content !!}
                    </p>



                </div>
            </div>
            <!--end comment-->
        </li>
        @endforeach







        <!--li>
            <div class="comment">
                <div class="comment__avatar">
                    <img alt="Image" src="/img/avatar-round-1.png" />
                </div>
                <div class="comment__body">
                    <h5 class="type--fine-print">Anne Brady</h5>
                    <div class="comment__meta">
                        <span>10th May 2016</span>
                        <a href="#">Reply</a>
                    </div>
                    <p>
                        Affordances food-truck SpaceTeam unicorn disrupt integrate viral pair programming big data pitch deck intuitive intuitive prototype long shadow. Responsive hacker intuitive driven
                    </p>
                </div>
            </div>

            <div class="comment">
                <div class="comment__avatar">
                    <img alt="Image" src="/img/avatar-round-3.png" />
                </div>
                <div class="comment__body">
                    <h5 class="type--fine-print">Jacob Sims</h5>
                    <div class="comment__meta">
                        <span>10th May 2016</span>
                        <a href="#">Reply</a>
                    </div>
                    <p>
                        Prototype intuitive intuitive thought leader personas parallax paradigm long shadow engaging unicorn SpaceTeam fund ideate paradigm.
                    </p>
                </div>
            </div>
        </li-->



    </ul>
</div>
<!--end comments-->
