@extends('layouts.app')
@section('title', '首页')

@section('content')
    <!-- COVER -->
    <section class="cover height-70 imagebg text-center slider slider--ken-burns" data-arrows="true" data-paging="true">
        <ul class="slides">
            <li class="imagebg" data-overlay="1">
                <div class="background-image-holder background--top">
                    <img alt="background" src="img/work-3.jpg" />
                </div>
                <div class="container pos-vertical-center ">
                    <div class="row">
                        <div class="col-sm-12 ">
                            <p><h1 class="h1--large">with&nbsp;<b><font color="#EA4335">S</font><font color="#FBBC05">T</font><font color="#34A853">E</font><font color="#4285F4">M</font>&nbsp;TOYS</b></h1></p>
                            <p class="lead"><span class="h4 inline-block typed-text typed-text--cursor color--white" data-typed-strings="all kids have to do to shape tomorrow is play"></span></p>
                            <a class="btn type--uppercase" href="{{route('products')}}">
                                <span class="btn__text">Shop now</span>
                            </a>
                        </div>
                    </div>
                </div>
            </li>
        </ul>
    </section>
    <section class="cover height-70 imagebg text-center slider ">
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
                            <a class="btn btn--primary type--uppercase" href="{{route('sbb')}}">
                                <span class="btn__text"> LET'S BUILD &raquo;</span>
                            </a>
                        </div>
                    </div>
                </div>
            </li>
        </ul>
    </section>
    <!-- SECTION_HANDWARE -->
    <section class="imageblock switchable switchable--switch feature-large bg--dark space--sm">
        <div class="imageblock__content col-md-6 col-sm-4 pos-right hidden-xs">
            <div class="background-image-holder">
                <img alt="image" src="img/landing-2.jpg" />
            </div>
        </div>
        <div class="container text-center-xs">
            <div class="row">
                <div class="col-md-5 col-sm-7 mt--2">
                    <h1 class="h1--large"><b>Handware</b></h1>
                    <p class="lead">Clean and contemporary style to suit a range of purposes marketing.</p>
                    <a class="btn btn--primary type--uppercase" href="{{route('posts.index')}}">
                        <span class="btn__text">Learn More &raquo;</span>
                    </a>
                </div>
            </div>
        </div>
    </section>
    <!-- SECTION_SOFTWARE -->
    <section class="imageblock switchable feature-large space--sm bg--secondary">
        <div class="imageblock__content col-md-6 col-sm-4 pos-right hidden-xs">
            <div class="background-image-holder">
                <img alt="image" src="img/inner-7.jpg" />
            </div>
        </div>
        <div class="container text-center-xs">
            <div class="row">
                <div class="col-md-5 col-sm-7">
                    <h1 class="h1--large"><b>Software</b></h1>
                    <p class="lead">Multiple font and colour scheme options mean that dramatically altering the look.</p>
                    <a class="btn btn--primary type--uppercase" href="{{route('topics.index')}}">
                        <span class="btn__text">Learn More &raquo;</span>
                    </a>
                </div>
            </div>
        </div>
    </section>
@stop
