@extends('layouts.app')
@section('title', $topic->title)
@section('content')


    <section class="bg--secondary space--sm">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-3">
                    <div class="boxed boxed--lg boxed--border">
                        <div class="text-block text-center">
                            <a href="{{route('users.show', [$topic->user_id])}}">
                            <img alt="{{ $topic->user->name }}" src="{{$topic->user->avatar}}" class="image--sm" />

                            <span class="h4"><strong>{{$topic->user->name}}</strong></span>
                            </a>
                            <span>{{$topic->user->introduction}}</span>
                            <span class="label">作者</span>
                        </div>
                        <hr>
                        <div class="text-block">
                            <ul class="menu-vertical">
                                <li>
                                    <a href="#" data-toggle-class=".account-tab:not(.hidden);hidden|#account-profile;hidden">文章数</a>
                                </li>
                                <li>
                                    <a href="#" data-toggle-class=".account-tab:not(.hidden);hidden|#account-notifications;hidden">关注数</a>
                                </li>
                                <li>
                                    <a href="#" data-toggle-class=".account-tab:not(.hidden);hidden|#account-billing;hidden">粉丝数</a>
                                </li>

                            </ul>
                        </div>
                        <hr>
                        @can('follow', $topic->user)

                            @if (Auth::user()->isFollowing($topic->user_id))
                                <form action="{{ route('followers.destroy', $topic->user_id) }}" method="post">
                                    {{ csrf_field() }}
                                    {{ method_field('DELETE') }}
                                    <button type="submit" class="btn btn--icon btn-outline-info ">
                                        <i class="fa fa-check"></i>&nbsp&nbsp&nbsp&nbsp 已关注</button>
                                    </button>
                                </form>
                            @else
                                <form action="{{ route('followers.store', $topic->user_id) }}" method="post">
                                    {{ csrf_field() }}
                                    <button type="submit" class=" btn btn--icon btn--primary  ">
                                                <span class="btn__text">
                                                    <i class="fa fa-plus"></i>&nbsp&nbsp&nbsp&nbsp 关注</span>
                                    </button>
                                </form>

                            @endif

                        @endcan

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
                                                <span>回复数：{{ $topic->reply_count }} </span>
                                                <span>
                                                    <a href="{{route('users.show', [$topic->user_id])}}">{{ $topic->user->name }}</a>
                                                </span>
                                            </div>
                                            <!--div class="article__author  text-center">
                                                <h4>{{ $topic->user->name }}</h4>
                                            </div-->
                                            <!--end article title-->
                                            <div class="article__body">

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
                                @include('topics._reply_list', ['replies' => $topic->replies()->with('user','topic')->orderBy('updated_at', 'desc')->paginate(10)])




                    </div>
                </div>
            </div>
            <!--end of row-->
        </div>
        <!--end of container-->
    </section>






@endsection
