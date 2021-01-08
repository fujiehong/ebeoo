
@extends('layouts.app')
@section('title', '商品列表')

@section('content')

    <section class="switchable switchable--switch space--xs">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="height-50 imagebg border--round" data-overlay="2">
                        <div class="background-image-holder">
                            <img alt="background" src="images/stem/stem_3.jpg" />
                        </div>
                        <div class="pos-vertical-center col-md-6 col-lg-5 pl-5">

                            <div class="typed-headline">

                                <span class="h3 inline-block typed-text typed-text--cursor color--white" data-typed-strings="BBSKID Smart Blocks"></span>
                            </div>
                            <p class="lead">
                                Individual smart blocks to expand your collection , mini creations to spark your imagination ,our kit comes with smart blocks and all the parts you need for builds
                            </p>
                        </div>
                    </div>
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
                    <div class="masonry masonry--tiles">
                        <div class="masonry-filter-container d-flex align-items-center">
                            <span>Category:</span>
                            <div class="masonry-filter-holder">
                                <div class="masonry__filters" data-filter-all-text="{{__('All Categories')}}"></div>
                            </div>
                        </div>
                        <div class="masonry__container row">
                            <div class="masonry__item col-md-4"></div>
                            {{-- 列表 --}}
                            @include('products._product_list', ['products' => $products])

                        </div>
                        <!--end masonry container-->


                        {{-- 分页 --}}
                        <div class="pagination">
                            <ol>
                                {!! $products->appends(Request::except('page'))->render() !!}
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

