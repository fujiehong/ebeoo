@guest
<!-- SECTION_BAR -->
<section class="bar bar-3 bar--sm bg--secondary border--bottom">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="bar__module">
                    <span class="type--fade">Ebeoo.com | 逸柏</span>
                </div>
            </div>
            <div class="col-md-6 text-right text-left-xs text-left-sm">
                <div class="bar__module">
                    <ul class="menu-horizontal">
                        <li>
                            <a href="{{route('login')}}" ><i class="fa fa-user"></i>&nbsp;&nbsp;{{__('Login')}}</a>


                            <!--div class="modal-instance">
                                <a href="#" class="modal-trigger"><i class="fa fa-user-o"></i>&nbsp;{{__('Login')}}</a>
                                <div class="modal-container">
                                    <div class="modal-content section-modal">
                                        <section class="unpad ">
                                            <div class="container">
                                                <div class="row justify-content-center">
                                                    <div class="col-md-6">
                                                        <div class="boxed boxed--lg bg--site text-center feature">
                                                            <div class="modal-close modal-close-cross"></div>
                                                            <h3>{{ __('Login') }}</h3>

                                                            <a class="btn block btn--icon bg--twitter type--uppercase" href="#">
                                                                        <span class="btn__text">
                                                                            <i class="socicon-wechat"></i>
                                                                            Login with Wechat
                                                                        </span>
                                                            </a>
                                                            <hr data-title="OR">
                                                            <div class="feature__body">
                                                                <form method="POST" action="{{ route('login') }}">
                                                                    @csrf
                                                                    <div class="row">
                                                                        <div class="col-md-12">
                                                                            <input id="email" type="email" placeholder="Email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                                                                            @error('email')
                                                                            <div class="col-md-6">
                                                                                <span class="color--error" role="alert">

                                                                                    <strong class="color--error">{{ $message }}</strong>


                                                                                </span>
                                                                            </div>
                                                                            @enderror
                                                                        </div>
                                                                        <div class="col-md-12">
                                                                            <input id="password" type="password" placeholder="Password" class="form-control @error('Password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                                                            @error('password')
                                                                            <span class="invalid-feedback" role="alert">
                                                                                <strong>{{ $message }}</strong>
                                                                            </span>
                                                                            @enderror
                                                                        </div>
                                                                        <div class="col-md-5">




                                                                            <div class="input-checkbox">
                                                                                <input  type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }} />
                                                                                <label></label>
                                                                            </div>
                                                                            <span>{{__('Remember Me')}}</span>




                                                                        </div>
                                                                        <div class="col-md-12">
                                                                            <button class="btn btn--primary type--uppercase" type="submit">Login</button>
                                                                        </div>
                                                                    </div>

                                                                </form>
                                                                <span class="type--fine-print block">{{ __('Dont have an account yet?') }}
                                                                    <a href="{{route('register')}}">{{ __('Register') }}?</a>
                                                                </span>
                                                                @if (Route::has('password.request'))
                                                                    <span class="type--fine-print block">{{ __('Forgot your username or password?') }}
                                                                        <a href="{{ route('password.request') }}">{{ __('Forgot Your Password?') }}</a>
                                                                    </span>
                                                                @endif
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>

                                        </section>
                                    </div>
                                </div>
                            </div-->
                        </li>
                        <li>
                            <a href="{{route('register')}}"><i class="fa fa-user-plus"></i>&nbsp;&nbsp;{{__('Create Account')}}</a>
                        </li>
                        <!--li>
                            <a href="#" data-notification-link="search-box"><i class="stack-search"></i></a>
                        </li>
                        <li>
                            <a href="#"><i class="stack-basket"></i></a>
                        </li-->
                        <li class="dropdown dropdown--absolute">
                                <span class="dropdown__trigger">
                                    @if (App::getLocale()=='en')
                                        <img alt="Image" class="flag" src="/images/flags/us/64.png" />

                                    @else
                                        <img alt="Image" class="flag" src="/images/flags/cn/64.png" />
                                    @endif


                                </span>
                            <div class="dropdown__container">
                                <div class="container">
                                    <div class="row">
                                        <div class="col-md-1 dropdown__content">
                                            <ul class="menu-vertical text-left">
                                                <li>
                                                    <a href="{{route('lang',array('lang'=>'zh-CN'))}}">中文</a>
                                                </li>
                                                <li>
                                                    <a href="{{route('lang',array('lang'=>'en'))}}">ENG</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>
@endguest
<!-- SEARCH_BOX
<div class="notification pos-top pos-right search-box bg--white border--bottom" data-animation="from-top" data-notification-link="search-box">
    <form>
        <div class="row">
            <div class="col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
                <input type="search" name="query" placeholder="Type search query and hit enter" />
            </div>
        </div>
    </form>
</div>
-->
<!-- NAV_CONTAINER -->
<div class="nav-container">
    <div class="bar bar--sm visible-xs">
        <div class="container">
            <div class="row">
                <div class="col-3 col-md-2">
                    <a href="{{route('root')}}">
                        <img class="logo logo-dark" alt="logo" src="/images/logo-color.png" />
                        <!--img class="logo logo-light" alt="logo" src="/images/logo-light.png" /-->
                    </a>
                </div>
                <div class="col-9 col-md-10 text-right">
                    <a href="#" class="hamburger-toggle" data-toggle-class="#menu1;hidden-xs">
                        <i class="icon icon--sm stack-interface stack-menu"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>

    <!-- MENU -->
    <nav id="menu1" class="bar bar--sm bar-1 bg--dark hidden-xs" data-scroll-class='366px:pos-fixed'>
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-1 col-sm-2 hidden-xs">
                    <div class="bar__module">
                        <a href="/">
                            <!--img class="logo logo-dark" alt="logo" src="/images/logo-color.png" /-->
                            <img class="logo logo-light" alt="logo" src="/images/logo-light.png" />
                        </a>
                    </div>
                    <!--end module-->
                </div>
                <div class="col-lg-5 text-center text-left-xs text-left-sm">
                    <div class="bar__module">
                        <ul class="menu-horizontal text-left">
                            <!--li class="dropdown">
                                <span class="dropdown__trigger">shop</span>
                                <div class="dropdown__container">
                                    <div class="container">
                                        <div class="row">
                                            <div class="dropdown__content col-lg-2 col-md-4">
                                                <ul class="menu-vertical">
                                                    <li class="">
                                                        <a href="#">
                                                            {{__('ALL')}}
                                                        </a>
                                                    </li>
                                                    <li class="">
                                                        <a href="#">
                                                            {{__('LAUNCH KITS')}}
                                                        </a>
                                                    </li>
                                                    <li class="">
                                                        <a href="#">
                                                            {{__('BUILDS')}}
                                                        </a>
                                                    </li>
                                                    <li class="">
                                                        <a href="#">
                                                            {{__('CUBES')}}
                                                        </a>
                                                    </li>
                                                    <li class="">
                                                        <a href="#">
                                                            {{__('PARTS')}}
                                                        </a>
                                                    </li>
                                                    <li class="">
                                                        <a href="#">
                                                            {{__('STEM / EDUCATE')}}
                                                        </a>
                                                    </li>
                                                    <li class="">
                                                        <a href="#">
                                                            {{__('RETAIL PARTNERS')}}
                                                        </a>
                                                    </li>

                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li class="dropdown">
                                <span class="dropdown__trigger">BUILDS</span>
                            </li>
                            <li class="dropdown">
                                <span class="dropdown__trigger">STEM</span>
                            </li>
                            <li class="dropdown">
                                <span class="dropdown__trigger">ABOUT</span>
                            </li-->




                            <li>
                                <a href="{{route('stemtoys')}}">  {{ __('stem toys') }}</a>
                            </li>
                            <li>
                                <a href="{{route('posts.index')}}">  {{ __('discovery') }}</a>
                            </li>
                            <li>
                                <a href="{{route('products')}}"> {{ __('products') }}</a>
                            </li>

                            <li>
                                <a href="{{route('topics.index')}}"> {{ __('topic') }}</a>
                            </li>
                            <li>
                                <a href="{{route('about')}}"> {{ __('about') }}</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-4 col-md-12  text-left-xs text-left-sm text-right">
                    <!--div class="bar__module">
                        <ul class="menu-horizontal text-left">
                            <li>
                                <a href="/en/smart-cubes">Smart Cubes</a>
                            </li>
                            <li>
                                <a href="/en/smart-cubes/products">Products</a>
                            </li>
                            <li>
                                <a href="/en/smart-cubes/build">Build</a>
                            </li>
                            <li>
                                <a href="/en/smart-cubes/press">Press</a>
                            </li>
                            <li>
                                <a href="/en/smart-cubes/about">About</a>
                            </li>
                        </ul>
                    </div-->
                    <!--end columns-->



                    @guest

                    <div class="bar__module">
                        <a class="btn btn--sm type--uppercase  "  href="{{route('login')}}">
                            <span class="btn__text">{{__('Login')}}</span>
                        </a>
                        <a class="btn btn--sm type--uppercase btn--primary" href="{{route('register')}}">
                            <span class="btn__text">{{__('Register')}}</span>
                        </a>
                    </div>

                    @else


                        <div class="bar__module">
                            <ul class="menu-horizontal text-left" >
                                <li >
                                    <a  href="{{ route('topics.create') }}">
                                        <i class="fa fa-plus"></i>
                                    </a>
                                </li>
                                <li >

                                            <a href="{{route('notifications.index')}}">
                                            <i class="fa fa-bell-o">{{ Auth::user()->notification_count }}</i>
                                            </a>

                                </li>
                                <li class="dropdown dropdown--hover">
                                        <span class="dropdown__trigger">

                                            <img alt="avatar" class="avatar image--xxs" src="{{Auth::user()->avatar}}" />
                                            {{ Auth::user()->name }}
                                        </span>
                                    <div class="dropdown__container">
                                        <div class="container">
                                            <div class="row">
                                                <div class="col-md-3 col-lg-2 dropdown__content">

                                                    <ul class="menu-vertical">

                                                        <li>
                                                            <a href="{{ route('users.show', Auth::id()) }}">个人中心</a>
                                                        </li>
                                                        <li>

                                                            <a href="{{ route('users.edit', Auth::id()) }}">编辑资料</a>
                                                        </li>


                                                        <li class="separate">
                                                            <form action="{{ route('logout') }}" method="POST" onsubmit="return confirm('您确定要退出吗？');">
                                                                {{ csrf_field() }}
                                                                <button class="btn btn-block btn-danger" type="submit" name="button">{{__('LOGOUT')}}</button>
                                                            </form>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <!--end row-->
                                        </div>
                                        <!--end container-->
                                    </div>
                                    <!--end dropdown container-->
                                </li>
                            </ul>
                        </div>
                        <div class="bar__module">

                            <a class="btn btn--sm type--uppercase btn--primary" id="logout" href="{{route('topics.index')}}">
                                <span class="btn__text">{{__('topic')}}</span>
                            </a>

                        </div>

                    @endguest

                </div>
            </div>
        </div>
    </nav>
</div>
