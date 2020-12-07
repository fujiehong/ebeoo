@if(count($posts))
    @foreach($posts as $post)

        <div class="masonry__item col-md-6 col-12 h" data-masonry-filter="Marketing">
            <a class="block" href="{{route('posts.show',$post->id)}}">
                <article class="imagebg border--round" data-scrim-bottom="8">
                    <span class="label">{{$post->label}}</span>
                    <div class="background-image-holder">
                        <img alt="background" src="{{$post->imgurl}}" />
                    </div>
                    <div class="article__title">
                        <span> {{$post->created_at}}</span>
                        &nbsp;&nbsp;
                        <span> {{$post->note}}</span>
                        <h4>{{$post->title}}</h4>
                    </div>
                </article>
            </a>
        </div>



        @if(!$post->last)
            <hr>
            @endif
        @endforeach


    @else
    <div class="empty-block">暂无数据 ~_~ </div>
@endif
