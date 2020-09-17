@extends('layouts.app')
@section('title', '登录')
@section('content')

    <section class="height-90 imagebg text-center" data-overlay="4">
        <!--div class="background-image-holder">
            <img alt="background" src="img/inner-6.jpg" />
        </div-->
        <div class="container pos-vertical-center">
            <div class="row">
                <div class="col-md-7 col-lg-5">
                    <h2>{{ __('Login') }}</h2>

                    <a class="btn block btn--icon bg--twitter type--uppercase" href="#">
                                <span class="btn__text">
                                    <i class="socicon-wechat"></i>
                                    {{ __('Login with wechat') }}
                                </span>
                    </a>
                    <hr>
                    <p>{{ __('Login using your Stack account') }}</p>
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
                                <button class="btn btn--primary type--uppercase" type="submit">{{__('Login')}}</button>
                            </div>
                        </div>
                        <!--end of row-->
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
            <!--end of row-->
        </div>
        <!--end of container-->
    </section>



@endsection
