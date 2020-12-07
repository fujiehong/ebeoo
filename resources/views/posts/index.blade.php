
@extends('layouts.app')
@section('title', '探索')

@section('content')

    <section class="space--sm">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="masonry masonry-blog-magazine">

                        <div class="masonry__container row">
                            <div class="masonry__item col-md-6"></div>

                            {{-- 列表 --}}
                            @include('posts._post_list',['posts'=>$posts])

                            <!--end item-->


                        </div>
                        <!--end masonry container-->
                        {{-- 分页 --}}
                        <div class="pagination">
                            <ol>
                                {!! $posts->appends(Request::except('page'))->render() !!}
                            </ol>
                        </div>

                    </div>
                    <!--end masonry-->
                </div>
            </div>
            <!--end of row-->
        </div>
        <!--end of container-->
    </section>






    @stop
