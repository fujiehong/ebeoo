@extends('sbb.layouts.app')
@section('title', 'blog列表')
@section('content')
    <section class="space--sm">
        <div class="container">
            <div class="row">
                <div class="col-md-12">

                    <ol class=" breadcrumbs">
                        <li>
                            <a class="type--uppercase" href="#">home</a>
                        </li>
                        <li>
                            <a class="type--uppercase" href="#">blogs</a>
                        </li>
                        @if ($blogCategory!='')
                            <li class="type--uppercase">{{$blogCategory->name}}</li>

                        @else
                            <li class="type--uppercase">all</li>
                        @endif

                    </ol>
                    <hr>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 col-lg-12">
                    <div class="masonry masonry--tiles">


                        <div class="masonry__container row">

                            {{-- 列表 --}}
                            @include('sbb.blogs._blog_list', ['blogs' => $blogs])
                        </div>
                        <!--end of masonry container-->
                        {{-- 分页 --}}


                        <div class="pagination">
                            <ol>
                                {!! $blogs->appends(Request::except('page'))->render() !!}
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



@endsection

