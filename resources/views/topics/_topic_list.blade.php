@if (count($topics))
    @foreach ($topics as $topic)
        <div class="col-md-4 masonry__item" data-masonry-filter="{{ $topic->category->name }}">
            <div class="card card-1 boxed boxed--sm boxed--border">
                <div class="card__top">
                    <div class="card__avatar">
                        <a href="{{ route('users.show', [$topic->user_id]) }}">
                            <img alt="Image" src="{{ $topic->user->avatar }}">
                        </a>
                        <a href="{{ route('users.show', [$topic->user_id]) }}">
                        <span>
                            <strong>{{ $topic->user->name }}</strong>
                        </span>
                        </a>
                    </div>
                    <div class="card__meta">
                        <span>{{ $topic->updated_at->diffForHumans() }}</span>
                    </div>
                </div>
                <div class="card__body">
                        @php

                            if(preg_match('/<img.+src=\s*[\'\"]?([^\'\"]*)[\'\"]?.+>/i',$topic->body,$match))
                            {
                        //dd($match);
                        @endphp
                            <p>
                                {{$topic->title}}

                            </p>
                            <a href="{{ $topic->link() }}" >
                                <img src="{{$match[1]}}" alt="Image" class="border--round"  width="100%">
                            </a>
                        @php
                            }else{
                        @endphp
                            <a href="{{ $topic->link() }}" >
                                <p>
                                    {{$topic->title}}
                                </p>
                            </a>


                        @php
                            }


                        @endphp

                </div>
                <div class="card__bottom">
                    <ul class="list-inline">
                        <li class="list-inline-item">
                            <div class="card__action">
                                <a href="#">
                                    <i class="fa fa-comment"></i>
                                    {{$topic->reply_count}}
                                </a>
                            </div>
                        </li>
                        <li class="list-inline-item">
                            <div class="card__action">
                                <a href="#">
                                    <i class="fa fa-heart"></i>
                                    6

                                </a>
                            </div>
                        </li>
                        <li class="list-inline-item">
                            <div class="card__action">
                                <a href="#">
                                    <i class="fa fa-share-alt"></i>
                                </a>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>



    <!--div class="masonry__item col-md-6" data-masonry-filter="Marketing">
        <article class="feature feature-1">
            <a href="#" class="block">
                <img alt="Image" src="img/blog-2.jpg" />
            </a>
            <div class="feature__body boxed boxed--border">
                <span title="最后活跃于：{{ $topic->updated_at }}">{{ $topic->updated_at->diffForHumans() }}</span>
                <h5>{{ $topic->title }}</h5>
                <a href="{{ route('topics.show', [$topic->id]) }}">
                    Read More
                </a>
            </div>
        </article>
    </div-->

    @if ( ! $topic->last)
        <hr>
    @endif

    @endforeach



@else
    <div class="empty-block">暂无数据 ~_~ </div>
@endif
