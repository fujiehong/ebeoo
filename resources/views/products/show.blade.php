@extends('layouts.app')
@section('title', $product->title)
@section('content')

    <section>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h3>{{$product->title}}</h3>

                    <hr>
                </div>
            </div>
            <!--end of row-->
        </div>
        <!--end of container-->
    </section>
    <section class="space--lg">
        <div class="container">
            <div class="row justify-content-around">
                <div class="col-md-7 col-lg-6">
                    <div class="slider border--round boxed--border" data-paging="true" data-arrows="true">
                        <ul class="slides">
                            <li>
                                <a href="{{ URL::asset($product->image) }}" data-lightbox="true">
                                    <img alt="Image" src="{{ URL::asset($product->image) }}" width="100%"/>
                                </a>
                                <!--img alt="Image" src="{{ URL::asset($product->image) }}" /-->
                            </li>

                        </ul>
                    </div>
                    <!--end slider-->
                </div>
                <div class="col-md-5 col-lg-4">
                    <h4>{{$product->title}}</h4>
                    <div class="text-block">
                        <span class="h4 type--strikethrough inline-block"><i class="fa fa-jpy" aria-hidden="true"></i> {{$product->original_price}}</span>
                        <span class="h4 inline-block"><i class="fa fa-jpy" aria-hidden="true"></i> {{$product->special_price}}</span>
                    </div>
                    <p>
                         {{$product->description}}
                    </p>
                    <ul class="accordion accordion-2 accordion--oneopen">
                        <li>
                            <div class="accordion__title">
                                <span class="h5">Specifications 产品规格</span>
                            </div>
                            <div class="accordion__content">
                                <ul class="bullets">
                                    {{$product->specification}}
                                </ul>
                            </div>
                        </li>
                        <li class="active">
                            <div class="accordion__title">
                                <span class="h5">Dimensions 产品尺寸</span>
                            </div>
                            <div class="accordion__content">
                                <ul>
                                    {{$product->dimension}}
                                </ul>
                            </div>
                        </li>
                        <li>
                            <div class="accordion__title">
                                <span class="h5">Shipping Info 快递信息</span>
                            </div>
                            <div class="accordion__content">
                                <p>
                                   {{$product->shipment}}
                                </p>
                            </div>
                        </li>
                    </ul>
                    <!--end accordion-->
                    <form>
                        <div class="col-md-12">

                        </div>

                        <div class="col-md-6 col-lg-4">
                            <input type="text" name="quantity" placeholder="数量" />
                        </div>
                        <div class="col-md-6 col-lg-8">
                            <button type="submit" class="btn btn--primary">Add To Cart</button>
                        </div>

                    </form>
                </div>
            </div>
            <!--end of row-->
        </div>
        <!--end of container-->
    </section>










@endsection

