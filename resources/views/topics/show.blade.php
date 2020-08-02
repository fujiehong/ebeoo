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
                                                <div class="video-cover border--round">
                                                    <div class="background-image-holder">
                                                        <img alt="image" src="/img/blog-3.jpg" />
                                                    </div>
                                                    <div class="video-play-icon"></div>
                                                    <iframe data-src="/video/video.mp4" allowfullscreen="allowfullscreen"></iframe>
                                                </div>
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
                        <hr>
                        @can('update', $topic)








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
                                <div class="comments-form">
                                    <h4>Leave a comment</h4>
                                    <form class="row">

                                        <div class="col-12 ">

                                            <textarea rows="4" name="Message" placeholder="Message"></textarea>
                                        </div>
                                        <div class="col-md-3">
                                            <button class="btn  btn--primary" type="submit">评论</button>
                                        </div>
                                    </form>
                                </div>
                                {{--end Leave a comment --}}
                                <br>
                                <div class="comments">

                                    <ul class="comments__list">
                                        <li>
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
                                            <!--end comment-->
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
                                            <!--end comment-->
                                        </li>
                                        <li>
                                            <div class="comment">
                                                <div class="comment__avatar">
                                                    <img alt="Image" src="/img/avatar-round-2.png" />
                                                </div>
                                                <div class="comment__body">
                                                    <h5 class="type--fine-print">Kelly Dewitt</h5>
                                                    <div class="comment__meta">
                                                        <span>11th May 2016</span>
                                                        <a href="#">Reply</a>
                                                    </div>
                                                    <p>
                                                        Responsive hacker intuitive driven waterfall is so 2000 and late intuitive cortado bootstrapping venture capital. Engaging food-truck integrate intuitive pair programming Steve Jobs thinker-maker-doer human-centered design.
                                                    </p>
                                                    <p>
                                                        Affordances food-truck SpaceTeam unicorn disrupt integrate viral pair programming big data pitch deck intuitive intuitive prototype long shadow. Responsive hacker intuitive driven
                                                    </p>
                                                </div>
                                            </div>
                                            <!--end comment-->
                                        </li>
                                        <li>
                                            <div class="comment">
                                                <div class="comment__avatar">
                                                    <img alt="Image" src="/img/avatar-round-4.png" />
                                                </div>
                                                <div class="comment__body">
                                                    <h5 class="type--fine-print">Luke Smith</h5>
                                                    <div class="comment__meta">
                                                        <span>11th May 2016</span>
                                                        <a href="#">Reply</a>
                                                    </div>
                                                    <p>
                                                        Unicorn disrupt integrate viral pair programming big data pitch deck intuitive intuitive prototype long shadow. Responsive hacker intuitive driven
                                                    </p>
                                                </div>
                                            </div>
                                            <!--end comment-->
                                        </li>
                                    </ul>
                                </div>
                                <!--end comments-->

                    </div>
                </div>
            </div>
            <!--end of row-->
        </div>
        <!--end of container-->
    </section>






@endsection
