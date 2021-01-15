@extends('sbb.layouts.app')
@section('title', '首页')

@section('content')
    <!-- COVER -->
    <section class="cover height-80 imagebg text-center slider slider--ken-burns" data-arrows="true" data-paging="true">
        <ul class="slides">
            <li class="imagebg" data-overlay="0">
                <div class="background-image-holder background-image-holder">
                    <img alt="background" src="images/power-your-builds.png" />
                </div>
                <div class="container pos-vertical-center">
                    <div class="row">
                        <div class="col-sm-12 ">
                            <h1 class="h1--large"><b><font color="#EA4335">POWER&nbsp; </font><font color="#4285F4">YOUR&nbsp; </font><font color="#FBBC05"> BUILDS</font></b></h1>
                            <p class="lead"><span class="h4 inline-block typed-text typed-text--cursor color--primary" data-typed-strings="all kids have to do to shape tomorrow is play"></span></p>

                        </div>
                    </div>
                </div>
            </li>
        </ul>
    </section>
    <!-- SECTION_SHOP -->
    <section class="imagebg text-center" data-gradient-bg="#FFE600">
        <div class="pos-vertical-center">
            <h2>SHOP</h2>
        </div>
    </section>




    <!-- SECTION_LAUNCH KITS -->
    <section>
        <div class="container">
            <div class="row">
                <div class=" col-md-12  text-center">
                    <ul class="list-inline list--hover ">

                        <li class="list-inline-item ">
                            <a href="{{route('collections',['1'])}}">
                                <h4>LAUNCH KITS</h4>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="row">
                <!--div class="col-md-3 col-6">
                    <a href="#" class="feature">
                        <img alt="Pic" src="img/tourism-9.jpg" width="100%"/>
                        <h5 class="mb--0">LA Beatbox Competition</h5>
                        <div>$75 &#9702; 4 hour experience</div>
                    </a>
                </div-->
                @include('sbb.pages._root_product_list',['products'=>$products])

            </div>
        </div>
    </section>




    <!-- SECTION_MEET THE CUBES -->

    <section class="text-center bg--secondary ">
        <div class="container">
            <div class="row ">
                <div class=" col-md-12  text-center">
                    <ul class="list-inline list--hover ">

                        <li class="list-inline-item ">
                            <a href="{{route('collections',['3'])}}">
                                    <h4>MEET THE CUBES</h4>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <div class="slider slider--inline-arrows slider--arrows-hover"  data-arrows="true">
                        <ul class="slides">
                            <!--li class="col-md-3 col-12">
                                <div class="product">
                                    <a href="#">
                                        <img alt="Image" src="img/product-small-2.png" width="100%"/>
                                    </a>
                                    <a class="block" href="#">
                                        <div>
                                            <h5>Apple Keyboard</h5>
                                            <span> Wireless Bluetooth</span>
                                        </div>
                                        <div>
                                            <span class="h4 inline-block">$99</span>
                                        </div>
                                    </a>
                                </div>
                            </li-->
                            @include('sbb.pages._root_product_list2',['products'=>$cubes])
                        </ul>
                    </div>
                </div>
                <!--end of col-->
            </div>
            <!--end row-->
        </div>
        <!--end of container-->
    </section>
    <section class="feature-large " data-gradient-bg="#FFE600">
        <div class="container">
            <div class="row justify-content-around">
                <div class="col-lg-9 col-md-6">
                    <img alt="Image" class="border--round box-shadow-wide" src="images/circuit-cubes-lego-stem-toys-imagination-play-4_1000x.png" width="100%"/>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="heading-block">
                        <h4>FOR ADVENTUROUS KIDS & SERIOUS BRICK ENTHUSIASTS</h4>
                    </div>
                    <div class="text-block">

                        <p>
                            Circuit Cubes are electronic building blocks that provide hours of fun & creativity. Build & power endless projects with Circuit Cubes, a pile of bricks & your imagination.
                        </p>
                    </div>

                </div>
            </div>
            <!--end of row-->
        </div>
        <!--end of container-->
    </section>


    <section class="bg--white">
        <div class="container">
            <div class="masonry">
                <!--end masonry filters-->
                <div class="masonry__container row">
                    <div class="masonry__item col-md-4 col-12" data-masonry-filter="Digital">
                        <div class="project-thumb hover-element border--round ">
                            <a href="{{route('sbb.products.show',[1])}}">
                                <div class="hover-element__initial">
                                    <div class="background-image-holder">
                                        <img alt="background" src="images/circuit-cubes-lego-stem-toy-mashup-helicopter-small.gif" />
                                    </div>
                                </div>
                                <div class="hover-element__reveal" data-overlay="1">
                                    <div class="project-thumb__title">
                                        <h4>Nuaca</h4>
                                        <span>Digital &amp; Interactive Design</span>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <!--end item-->
                    <div class="masonry__item col-md-4 col-12" data-masonry-filter="Print">
                        <div class="project-thumb hover-element border--round ">
                            <a href="{{route('sbb.products.show',[2])}}">
                                <div class="hover-element__initial">
                                    <div class="background-image-holder">
                                        <img alt="background" src="images/circuit-cubes-lego-stem-toy.gif" />
                                    </div>
                                </div>

                            </a>
                        </div>
                    </div>
                    <!--end item-->
                    <div class="masonry__item col-md-4 col-12" data-masonry-filter="Branding">
                        <div class="project-thumb hover-element border--round ">
                            <a href="{{route('sbb.products.show',[2])}}">
                                <div class="hover-element__initial">
                                    <div class="background-image-holder">
                                        <img alt="background" src="images/circuit-cubes-lego-stem-toy-build-mashup-332-digger-small.gif" />
                                    </div>
                                </div>
                                <div class="hover-element__reveal" data-overlay="2">
                                    <div class="project-thumb__title">
                                        <h4>M&amp;D Stairs Company</h4>
                                        <span>Branding &amp; Identity</span>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <!--end item-->

                </div>
                <!--end of masonry container-->
            </div>
            <!--end masonry-->
        </div>
        <!--end of container-->
    </section>
    <section class="feature-large switchable" data-gradient-bg="#FFE600">
        <div class="container">
            <div class="row justify-content-around">
                <div class="col-lg-9 col-md-6">
                    <img alt="Image" class="border--round box-shadow-wide" src="images/heffalump.gif" width="100%"/>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="heading-block">
                        <h4>CREATION STATION</h4>
                    </div>
                    <div class="text-block">

                        <p>
                            We're always coming up with new ways to build with Circuit Cubes. Check back for new & creative ideas!
                        </p>
                        <a href="#">LET'S BUILD</a>
                    </div>

                </div>
            </div>
            <!--end of row-->
        </div>
        <!--end of container-->
    </section>
    <section class="bg--white">
        <div class="container">
            <div class="masonry">
                <!--end masonry filters-->
                <div class="masonry__container row">
                    <div class="masonry__item col-md-4 col-12" >
                        <div class="project-thumb hover-element ">
                            <a href="{{route('sbb.products.show',[1])}}">
                                <div class="hover-element__initial">
                                    <div class="background-image-holder">
                                        <img alt="background" src="images/circuit-cubes-lego-stem-toy-mashup-helicopter-small.gif" />
                                    </div>
                                </div>
                                <div class="hover-element__reveal" data-overlay="1">
                                    <div class="project-thumb__title">
                                        <h4>Nuaca</h4>
                                        <span>Digital &amp; Interactive Design</span>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <!--end item-->
                    <div class="masonry__item col-md-4 col-12" >
                        <div class="project-thumb   ">
                            <img alt="background" src="images/circuit-cubes-red-tricycle-review-3_394x.png" width="100%"/>

                        </div>
                    </div>
                    <!--end item-->

                    <div class="masonry__item col-md-4 col-12" >
                        <div class="project-thumb hover-element  ">
                            <a href="{{route('sbb.products.show',[2])}}">
                                <div class="hover-element__initial">
                                    <div class="background-image-holder">
                                        <img alt="background" src="images/circuit-cubes-lego-stem-toy-build-mashup-332-digger-small.gif" />
                                    </div>
                                </div>
                                <div class="hover-element__reveal" data-overlay="2">
                                    <div class="project-thumb__title">
                                        <h4>M&amp;D Stairs Company</h4>
                                        <span>Branding &amp; Identity</span>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>

                    <!--end item-->



                    <div class="masonry__item col-md-4 col-12" >
                        <div class="project-thumb hover-element  ">
                            <a href="{{route('sbb.products.show',[3])}}">
                                <div class="hover-element__initial">
                                    <div class="background-image-holder">
                                        <img alt="background" src="images/circuit-cubes-lego-stem-toy-build-mashup-332-digger-small.gif" />
                                    </div>
                                </div>
                                <div class="hover-element__reveal" data-overlay="2">
                                    <div class="project-thumb__title">
                                        <h4>M&amp;D Stairs Company</h4>
                                        <span>Branding &amp; Identity</span>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="masonry__item col-md-4 col-12" >
                        <div class="project-thumb">
                            <img alt="background" src="images/circuit-cubes-lego-stem-toy-394x.png" width="100%"/>

                        </div>
                    </div>
                    <!--end item-->
                    <div class="masonry__item col-md-4 col-12" >
                        <div class="project-thumb  ">

                            <img alt="background" src="images/circuit-cubes-instagram-cyan-digital-trends_394x.png" width="100%"/>

                        </div>
                    </div>

                    <!--end item-->
                    <div class="masonry__item col-md-4 col-12" >
                        <div class="project-thumb hover-element  ">
                            <a href="{{route('sbb.products.show',[4])}}">
                                <div class="hover-element__initial">
                                    <div class="background-image-holder">
                                        <img alt="background" src="images/circuit-cubes-lego-stem-toy-mashup-helicopter-small.gif" />
                                    </div>
                                </div>
                                <div class="hover-element__reveal" data-overlay="1">
                                    <div class="project-thumb__title">
                                        <h4>Nuaca</h4>
                                        <span>Digital &amp; Interactive Design</span>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="masonry__item col-md-4 col-12">
                        <div class="project-thumb  ">
                            <img alt="background" src="images/circuit-cubes-lego-stem-toy-amazon-parent-394x.png" width="100%"/>


                        </div>
                    </div>

                    <!--end item-->
                    <div class="masonry__item col-md-4 col-12" >
                        <div class="project-thumb hover-element  ">
                            <a href="{{route('sbb.products.show',[5])}}">
                                <div class="hover-element__initial">
                                    <div class="background-image-holder">
                                        <img alt="background" src="images/circuit-cubes-lego-stem-toy-build-mashup-332-digger-small.gif" />
                                    </div>
                                </div>
                                <div class="hover-element__reveal" data-overlay="2">
                                    <div class="project-thumb__title">
                                        <h4>M&amp;D Stairs Company</h4>
                                        <span>Branding &amp; Identity</span>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <!--end item-->


                </div>
                <!--end of masonry container-->
            </div>
            <!--end masonry-->
        </div>
        <!--end of container-->
    </section>

    <section class="height-10 feature-large switchable" data-gradient-bg="#FFE600">
        <div class="container">
            <div class="row justify-content-center text-center">

                <div class="col-lg-12 col-md-12">
                    <a href="#">LET'S BUILD</a>&nbsp;|&nbsp;<a href="#">LET'S BUILD</a>&nbsp;|&nbsp;<a href="#">LET'S BUILD</a>&nbsp;|&nbsp;<a href="#">LET'S BUILD</a>




                </div>
            </div>
            <!--end of row-->
        </div>
        <!--end of container-->
    </section>

@stop
