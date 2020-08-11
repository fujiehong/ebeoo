@extends('layouts.app')

@section('title', $user->name . ' 的个人中心')

@section('content')

    <section class="bg--secondary space--sm">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="boxed boxed--lg boxed--border">



                        <div class="text-block text-center">
                            <img alt="{{$user->name}}" src="{{$user->avatar}}" class="image--md" />
                            <span class="h5">{{$user->name}}</span>
                            <span>{{$user->introduction}}</span>

                            @can('follow', $user)

                                    @if (Auth::user()->isFollowing($user->id))
                                        <form action="{{ route('followers.destroy', $user->id) }}" method="post">
                                            {{ csrf_field() }}
                                            {{ method_field('DELETE') }}
                                            <button type="submit" class="btn btn--icon btn-outline-primary col-lg-3 ">
                                                <i class="fa fa-check"></i>&nbsp&nbsp&nbsp&nbsp 已关注</button>
                                        </form>
                                    @else
                                        <form action="{{ route('followers.store', $user->id) }}" method="post">
                                            {{ csrf_field() }}
                                            <button type="submit" class=" btn btn--icon btn--primary col-lg-3 ">
                                                <span class="btn__text">
                                                    <i class="fa fa-plus"></i>&nbsp&nbsp&nbsp&nbsp 关注</span>
                                            </button>
                                        </form>

                                    @endif

                            @endcan


                        </div>

                        <div class="text-block clearfix text-center">
                            <ul class="row row--list">
                                <li class="col-md-6">
                                    <span class="type--fine-print block">最后活跃时间:</span>
                                    <span>{{ $user->created_at->diffForHumans() }}</span>
                                </li>
                                <li class="col-md-6">
                                    <span class="type--fine-print block">注册时间:</span>
                                    <span>{{ $user->created_at->diffForHumans() }}</span>
                                </li>

                        </div>
                        </ul>
                    </div>
                    <div class="boxed boxed--border">
                        <ul class="row row--list clearfix text-center">
                            <li class="col-md-3 col-6">
                                <a href="{{ route('users.followers', $user->id) }}">
                                <span class="h6 type--uppercase type--fade">粉丝</span>
                                <span class="h3">{{ count($user->followers) }}</span>
                                </a>
                            </li>
                            <li class="col-md-3 col-6">
                                <span class="h6 type--uppercase type--fade">文章</span>
                                <span class="h3">{{count($user->topics)}}</span>
                            </li>
                            <li class="col-md-3 col-6">
                                <span class="h6 type--uppercase type--fade">评论</span>
                                <span class="h3">{{count($user->replies)}}</span>
                            </li>
                            <li class="col-md-3 col-6">
                                <a href="{{ route('users.followings', $user->id) }}">
                                <span class="h6 type--uppercase type--fade">关注</span>
                                <span class="h3">{{ count($user->followings) }}</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                    <!--div class="boxed boxed--border">
                        <h4>Connections</h4>
                        <ul class="clearfix row row--list text-center">
                            <li class="col-md-3 col-6">
                                <a href="#">
                                    <img alt="avatar" src="/img/avatar-round-2.png" class="image--sm" />
                                    <span class="block">Alice Merriweather</span>
                                </a>
                            </li>
                            <li class="col-md-3 col-6">
                                <a href="#">
                                    <img alt="avatar" src="/img/avatar-round-1.png" class="image--sm" />
                                    <span class="block">Kelly Burgess</span>
                                </a>
                            </li>
                            <li class="col-md-3 col-6">
                                <a href="#">
                                    <img alt="avatar" src="/img/avatar-round-4.png" class="image--sm" />
                                    <span class="block">Marc Nguyen</span>
                                </a>
                            </li>
                            <li class="col-md-3 col-6">
                                <a href="#">
                                    <img alt="avatar" src="/img/avatar-round-5.png" class="image--sm" />
                                    <span class="block">Selena Rouse</span>
                                </a>
                            </li>
                        </ul>
                        <a href="#" class="type--fine-print pull-right">View All</a>
                    </div-->
                    <div class="boxed boxed--border">



                        <h4>文章</h4>
                        @include('users._topics', ['topics' => $user->topics()->recent()->paginate(10)])


                    </div>
                </div>
            </div>
            <!--end of row-->
        </div>
        <!--end of container-->
    </section>

@stop
