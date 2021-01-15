@if (count($blogs))
    @foreach ($blogs as $blog)

        <div class="col-md-3 masonry__item" ">
            <div class="card card-1 boxed boxed--sm boxed--border">

                <div class="card__body">
                    @php

                        if(preg_match('/<img.+src=\s*[\'\"]?([^\'\"]*)[\'\"]?.+>/i',$blog->body,$match))
                        {
                    //dd($match);
                    @endphp

                    <a href="{{$blog->link()}}" >
                        <img src="{{$match[1]}}" alt="Image" class="border--round"  width="100%">
                    </a>

                    @php
                        }else{
                    @endphp
                    <a href="{{$blog->link()}}" >
                        <p>
                            {{$blog->title}}
                        </p>
                    </a>


                    @php
                        }


                    @endphp

                </div>

                <div class="card__bottom">

                        <span>{{ $blog->updated_at->diffForHumans() }}</span>

                        <h5>{{$blog->title}}</h5>
                        <a href="{{$blog->link()}}">
                            Read More
                        </a>

                </div>
            </div>
        </div>


        <!--div class="masonry__item col-lg-4 col-md-6" data-masonry-filter="Marketing">
            <article class="feature feature-1">
                @php

                    if(preg_match('/<img.+src=\s*[\'\"]?([^\'\"]*)[\'\"]?.+>/i',$blog->body,$match))
                    {
                //dd($match);
                @endphp

                <a href="#" class="block">
                    <img alt="Image" src="{{$match[1]}}" width="100%"/>
                </a>
                <div class="feature__body boxed boxed--border">
                    <span>{{ $blog->updated_at->diffForHumans() }}</span>
                    <h5>{{$blog->title}}</h5>
                    <a href="#">
                        Read More
                    </a>
                </div>

                @php
                    }else{
                @endphp

                <div class="feature__body boxed boxed--border">
                    <span>{{ $blog->updated_at->diffForHumans() }}</span>
                    <h5>{{$blog->title}}</h5>
                    <a href="#">
                        Read More
                    </a>
                </div>


                @php
                    }


                @endphp

            </article>


        </div-->





        @if ( ! $blog->last)
            <hr>
        @endif

    @endforeach



@else
    <div class="col-md-6">暂无数据 ~_~ </div>
@endif

