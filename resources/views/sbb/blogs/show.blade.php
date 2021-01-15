@extends('sbb.layouts.app')
@section('title', $blog->title)
@section('content')


    <section class="bg--white space--sm">
        <div class="container">






                        <div class="row justify-content-center">
                            <div class="col-md-10 col-lg-8">
                                <article>
                                    <div class="article__title text-center">
                                        <a href="#">
                                            <h2>{{ $blog->title }}</h2>
                                        </a>
                                        <span>{{ $blog->created_at->diffForHumans() }} </span>
                                        <span>回复数：{{ $blog->reply_count }} </span>

                                    </div>

                                    <div class="article__body">

                                            {!! $blog->body !!}

                                    </div>




                                </article>
                                <!--end item-->


                            </div>



                        </div>
                        <!--end of row-->
        </div>
        <!--end of container-->
    </section>

    <section class="space--sm">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <hr>
                </div>
            </div>
            <!--end of row-->
        </div>
        <!--end of container-->
    </section>

    <section>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-10 col-lg-8">
                    @includeWhen(Auth::check(), 'sbb.blogs._reply_box', ['blog' => $blog])
                        <br>
                    @include('sbb.blogs._reply_list', ['replies' => $blog->replies()->with('user','blog')->orderBy('updated_at', 'desc')->paginate(10)])
                    <!--end comments-->

                </div>
            </div>
            <!--end of row-->
        </div>
        <!--end of container-->
    </section>









@endsection
