@if (count($topics))

    <ul>
        @foreach ($topics as $topic)
            <li class="clearfix">
                <div class="row">
                    <div class="col-lg-2 col-3 text-center">
                        <div class="icon-circle ">
                            <i class="fa fa-edit"></i>
                        </div>
                    </div>

                    <div class="col-lg-10 col-7">
                        <a href="{{ route('topics.show', $topic->id) }}">
                            {{ $topic->title }}
                        </a>
                        <p >
                          {{ $topic->reply_count }} 回复
                          <span> ⋅ </span>
                          {{ $topic->created_at->diffForHumans() }}
                        </p>
                    </div>
                </div>
                <hr>
            </li>
        @endforeach



    </ul>

@else
    <div class="empty-block">暂无数据 ~_~ </div>
@endif

{{-- 分页 --}}

<div class="pagination">
    <ol>

        {!! $topics->render() !!}
    </ol>
</div>




