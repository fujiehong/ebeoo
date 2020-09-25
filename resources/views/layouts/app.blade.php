<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">

<head>
    <meta charset="utf-8">
    <link rel="icon" type="image/x-icon" href="/images/favicon.ico" media="screen" />
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0" />
    <meta name="description" content="Ebeoo Smart Cubes are electronic building blocks that add sound, motion, light, and sensors to young Makers‘ creations. They integrate with LEGO-style bricks for endless projects. Visit the site to learn, buy, and get support." />

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', 'Ebeoo') - Smart Cubes</title>

    <meta name="description" content="@yield('description', 'Ebeoo')" />

    <!-- Styles -->
    <link rel="stylesheet" type="text/css" media="all" href="{{URL::asset('css/bootstrap.css')}}" />
    <link rel="stylesheet" type="text/css" media="all" href="{{URL::asset('css/stack-interface.css')}}" />
    <link rel="stylesheet" type="text/css" media="all" href="{{URL::asset('css/socicon.css')}}" />
    <link rel="stylesheet" type="text/css" media="all" href="{{URL::asset('css/lightbox.min.css')}}" />
    <link rel="stylesheet" type="text/css" media="all" href="{{URL::asset('css/flickity.css')}}" />
    <!--link rel="stylesheet" type="text/css" media="all" href="{{URL::asset('css/iconsmind.css')}}" /-->
    <link rel="stylesheet" type="text/css" media="all" href="{{URL::asset('css/jquery.steps.css')}}" />
    <link rel="stylesheet" type="text/css" media="all" href="{{URL::asset('css/theme.css')}}" />
    <link rel="stylesheet" type="text/css" media="all" href="{{URL::asset('css/custom.css')}}" />
    <link rel="stylesheet" href="{{URL::asset('css/font-awesome.min.css')}}" >


    <!-- 需要导入的Styles -->
    @yield('styles')


    <!--link href="https://fonts.googleapis.com/css?family=Open+Sans:200,300,400,400i,500,600,700%7CMerriweather:300,300i" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,400i,500,700" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" /-->

</head>

<body class=" ">
<a id="start"></a>


    @include('layouts._header')
    <!-- MAIN_CONTAINER -->
    <div class="main-container">

        <!--message-->
        @include('shared._messages')
        <!--CONTENT-->
        @yield('content')
        <!-- FOOTER -->
        @include('layouts._footer')

    </div>


    <!-- BACK_TO_TOP -->
    <a class="back-to-top inner-link" href="#start" data-scroll-class="100vh:active">
        <i class="stack-interface stack-up-open-big"></i>
    </a>


<!-- Scripts -->

<script type="text/javascript" src="{{URL::asset('js/jquery-3.1.1.min.js')}}"></script>
<script type="text/javascript" src="{{URL::asset('js/flickity.min.js')}}"></script>
<script type="text/javascript" src="{{URL::asset('js/easypiechart.min.js')}}"></script>
<script type="text/javascript" src="{{URL::asset('js/parallax.js')}}"></script>
<script type="text/javascript" src="{{URL::asset('js/typed.min.js')}}"></script>
<script type="text/javascript" src="{{URL::asset('js/datepicker.js')}}"></script>
<script type="text/javascript" src="{{URL::asset('js/isotope.min.js')}}"></script>
<script type="text/javascript" src="{{URL::asset('js/ytplayer.min.js')}}"></script>
<script type="text/javascript" src="{{URL::asset('js/lightbox.min.js')}}"></script>
<script type="text/javascript" src="{{URL::asset('js/granim.min.js')}}"></script>
<script type="text/javascript" src="{{URL::asset('js/jquery.steps.min.js')}}"></script>
<script type="text/javascript" src="{{URL::asset('js/countdown.min.js')}}"></script>
<script type="text/javascript" src="{{URL::asset('js/twitterfetcher.min.js')}}"></script>
<script type="text/javascript" src="{{URL::asset('js/spectragram.min.js')}}"></script>
<script type="text/javascript" src="{{URL::asset('js/smooth-scroll.min.js')}}"></script>
<script type="text/javascript" src="{{URL::asset('js/scripts.js')}}"></script>

<!-- 需要导入scripts -->
@yield('scripts')

</body>

</html>
