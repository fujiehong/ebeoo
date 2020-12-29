@extends('layouts.app')
@section('title', $post->title)
@section('content')

    <section>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-10 col-lg-8">
                    <article>
                        <div class="article__title text-center">
                            <h1 class="h2">{{$post->title}}</h1>
                            <span>{{$post->created_at}}</span>
                            <span>
                                        <a href="{{route('about')}}">伴宝士</a>
                                    </span>
                        </div>
                        <!--end article title-->
                        <div class="article__body">
                            <figure class="col-12 pull-right">
                                <img alt="Image" src="{{ URL::asset($post->imgurl) }}" width="100%"/>
                                <figcaption>{{$post->label}}</figcaption>
                            </figure>
                            <p>
                               {{$post->note}}
                            </p>
                            <h5>Description</h5>
                            <p>
                                {{$post->description}}
                            </p>


                        </div>
                        <!--div class="article__share text-center">
                            <a class="btn bg--facebook btn--icon" href="#">
                                        <span class="btn__text">
                                            <i class="socicon socicon-facebook"></i>
                                            Share on Facebook
                                        </span>
                            </a>
                            <a class="btn bg--twitter btn--icon" href="#">
                                        <span class="btn__text">
                                            <i class="socicon socicon-twitter"></i>
                                            Share on Twitter
                                        </span>
                            </a>
                        </div-->
                    </article>
                    <!--end item-->
                </div>
            </div>
            <!--end of row-->
        </div>
        <!--end of container-->
    </section>

    @stop
