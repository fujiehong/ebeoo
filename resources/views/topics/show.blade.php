@extends('layouts.app')
@section('title', $topic->title)
@section('content')


    <section class="bg--secondary space--sm">
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="boxed boxed--lg boxed--border">
                        <div class="text-block text-center">
                            <img alt="{{ $topic->user->name }}" src="{{$topic->user->avatar}}" class="image--sm" />
                            <span class="h4"><strong>{{$topic->user->name}}</strong></span>
                            <span>{{$topic->user->introduction}}</span>
                            <span class="label">作者</span>
                        </div>
                        <hr>
                        <div class="text-block">
                            <ul class="menu-vertical">
                                <li>
                                    <a href="#" data-toggle-class=".account-tab:not(.hidden);hidden|#account-profile;hidden">编辑个人资料</a>
                                </li>
                                <li>
                                    <a href="#" data-toggle-class=".account-tab:not(.hidden);hidden|#account-notifications;hidden">Email Notifications</a>
                                </li>
                                <li>
                                    <a href="#" data-toggle-class=".account-tab:not(.hidden);hidden|#account-billing;hidden">Billing Details</a>
                                </li>
                                <li>
                                    <a href="#" data-toggle-class=".account-tab:not(.hidden);hidden|#account-password;hidden">修改密码</a>
                                </li>
                                <li>
                                    <a href="#" data-toggle-class=".account-tab:not(.hidden);hidden|#account-delete;hidden">Delete Account</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-9">
                    <div class="boxed boxed--lg boxed--border">
                        <a class=" label "  href="{{ route('topics.index') }}"><span class="btn__text">

                                                       <i class="icon-Arrow-Back"></i>列表
                                                    </span></a>

                                <div class="row justify-content-center">
                                    <div class="col-md-10 col-lg-12">
                                        <article>
                                            <div class="article__title text-center">
                                                <a href="#">
                                                    <h2>{{ $topic->title }}</h2>
                                                </a>
                                                <span>{{ $topic->created_at->diffForHumans() }} </span>
                                                <span>
                                                    <a href="#">Web Design</a>
                                                </span>
                                            </div>
                                            <div class="article__author  text-center">
                                                <h4>{{ $topic->user->name }}</h4>
                                            </div>
                                            <!--end article title-->
                                            <div class="article__body">
                                                <!--div class="video-cover border--round">
                                                    <div class="background-image-holder">
                                                        <img alt="image" src="/img/blog-3.jpg" />
                                                    </div>
                                                    <div class="video-play-icon"></div>
                                                    <iframe data-src="/video/video.mp4" allowfullscreen="allowfullscreen"></iframe>
                                                </div-->
                                                <!--end video cover-->
                                                <p>
                                                    {!! $topic->body !!}
                                                </p>


                                            </div>
                                            <br>



                                        </article>
                                        <!--end item-->


                                    </div>


                                </div>
                                <!--end of row-->

                        @can('update', $topic)
                            <hr>
                                    <div class="row">

                                        <div class="col-md-2">
                                            <form  action="{{ route('topics.edit', $topic->id) }}" method="get">


                                                <button type="submit" class="btn btn--primary">编辑</button>
                                                {{ csrf_field() }}

                                            </form>

                                        </div>


                                        <div class="col-md-2">
                                            <form  action="{{ route('topics.destroy', $topic->id) }}" method="post"

                                                   onsubmit="return confirm('您确定要删除吗？');">


                                                <button type="submit" class="btn btn--primary">删除</button>
                                                {{ csrf_field() }}
                                                {{ method_field('DELETE') }}
                                            </form>

                                        </div>
                                    </div>

                        @endcan


                    </div>






                    <div class="boxed boxed--lg boxed--border ">

                        <div class="row justify-content-center">
                            <div class="col-md-10 col-lg-12">
                                @includeWhen(Auth::check(), 'topics._reply_box', ['topic' => $topic])
                                <br>
                                @include('topics._reply_list', ['replies' => $topic->replies()->with('user')->get()])




                    </div>
                </div>
            </div>
            <!--end of row-->
        </div>
        <!--end of container-->
    </section>






@endsection
