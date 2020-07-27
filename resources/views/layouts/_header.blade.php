@guest
<!-- SECTION_BAR -->
<section class="bar bar-3 bar--sm bg--secondary border--bottom">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="bar__module">
                    <span class="type--fade">Ebeoo.com | slogan</span>
                </div>
            </div>
            <div class="col-md-6 text-right text-left-xs text-left-sm">
                <div class="bar__module">
                    <ul class="menu-horizontal">
                        <li>
                            <a href="{{ route('login') }}"><i class="icon-Checked-User"></i>&nbsp;Login</a>
                        </li>
                        <li>
                            <a href="{{route('register')}}"><i class="icon-Add-User"></i>&nbsp;Create Account</a>
                        </li>
                        <li>
                            <a href="#" data-notification-link="search-box"><i class="stack-search"></i></a>
                        </li>
                        <li>
                            <a href="#"><i class="stack-basket"></i></a>
                        </li>
                        <li class="dropdown dropdown--absolute">
                                <span class="dropdown__trigger">
                                    <img alt="Image" class="flag" src="/images/flags/cn/64.png" />
                                </span>
                            <div class="dropdown__container">
                                <div class="container">
                                    <div class="row">
                                        <div class="col-md-1 dropdown__content">
                                            <ul class="menu-vertical text-left">
                                                <li>
                                                    <a href="/cn/smart-cubes">简体</a>
                                                </li>
                                                <li>
                                                    <a href="/en/smart-cubes">ENG</a>
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
                <div class="col-xs-3 col-sm-2">
                    <a href="/en">
                        <!--img class="logo logo-dark" alt="logo" src="/images/logo-color.png" />
                        <img class="logo logo-light" alt="logo" src="/images/logo-color.png" /-->
                    </a>
                </div>
                <div class="col-xs-9 col-sm-10 text-right">
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
                <div class="col-md-1 col-sm-2 hidden-xs">
                    <div class="bar__module">
                        <a href="/">
                            <img class="logo logo-dark" alt="logo" src="/images/logo-color.png" />
                            <img class="logo logo-light" alt="logo" src="/images/logo-light.png" />
                        </a>
                    </div>
                    <!--end module-->
                </div>
                <div class="col-lg-11 col-md-12  text-left-xs text-left-sm text-right">
                    <div class="bar__module">
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
                    </div>
                    <!--end columns-->



                    @guest

                    <div class="bar__module">
                        <a class="btn btn--sm type--uppercase" href="{{route('login')}}">
                            <span class="btn__text">Login</span>
                        </a>
                        <a class="btn btn--sm type--uppercase btn--primary" href="{{route('register')}}">
                            <span class="btn__text">Register</span>
                        </a>
                    </div>

                    @else


                        <div class="bar__module">
                            <ul class="menu-horizontal text-left" >
                                <li class="dropdown dropdown--hover">
                                        <span class="dropdown__trigger">
                                            <img alt="avatar" class="avatar image--xxs" src="https://cdn.learnku.com/uploads/images/201709/20/1/PtDKbASVcz.png?imageView2/1/w/60/h/60" />
                                            {{ Auth::user()->name }}
                                        </span>
                                    <div class="dropdown__container">
                                        <div class="container">
                                            <div class="row">
                                                <div class="col-md-3 col-lg-2 dropdown__content">

                                                    <ul class="menu-vertical">

                                                        <li>
                                                            <a href="#">个人中心</a>
                                                        </li>
                                                        <li>
                                                            <a href="#">编辑资料</a>
                                                        </li>

                                                        <li class="separate">
                                                            <form action="{{ route('logout') }}" method="POST">
                                                                {{ csrf_field() }}
                                                                <button class="btn btn-block btn-danger" type="submit" name="button">退出</button>
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




                            <a class="btn btn--sm type--uppercase btn--primary" id="logout" href="#">
                                <span class="btn__text">退出</span>
                            </a>



                        </div>

                    @endguest

                </div>
            </div>
        </div>
    </nav>
</div>
