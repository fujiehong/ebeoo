@extends('layouts.app')

@section('content')

    <section class="switchable ">
        <div class="container">
            <div class="row justify-content-between align-items-center">
                <div class="col-md-6 col-lg-5">
                    <div class="switchable__text">
                        <h2>{{ __('Create an Ebeoo account') }}</h2>
                        <span class="lead">{{ __('Already have an account?') }}
                            <br class="hidden-xs hidden-sm" />
                            <a href="{{route('login')}}">{{ __('Sign In') }}</a>
                                            </span>

                        <form method="POST" action="{{ route('register') }}">
                            @csrf
                            <div class="row">
                                <div class="col-12">
                                    <input id="name" type="text"  name="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}" required autocomplete="name" autofocus placeholder="{{__('Name')}}" />
                                    @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="col-12">
                                    <input id="email" type="email"  class="form-control @error('email') is-invalid @enderror" placeholder="{{__('Email')}}" name="email" value="{{ old('email') }}" required autocomplete="email">

                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="col-12">
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" placeholder="{{__('Password')}}" name="password" required autocomplete="new-password">

                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="col-12">
                                    <input id="password-confirm" type="password" placeholder="{{ __('Confirm Password') }}" class="form-control" name="password_confirmation" required autocomplete="new-password">
                                </div>
                                <div class="col-12">
                                    <input id="captcha" type="text" class="form-control{{ $errors->has('captcha') ? ' is-invalid' : '' }}" placeholder="{{ __('captcha') }}" name="captcha" required>
                                    <img class="thumbnail captcha mt-3 mb-2" src="{{ captcha_src('flat') }}" onclick="this.src='/captcha/flat?'+Math.random()" title="点击图片重新获取验证码">

                                    @if ($errors->has('captcha'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('captcha') }}</strong>
                                        </span>
                                    @endif
                                </div>


                                <div class="col-12">
                                    <button type="submit" class="btn btn--primary">{{ __('Register') }}</button>
                                </div>

                                <div class="col-12">
                                                        <span class="type--fine-print">By signing up, you agree to the
                                                            <a href="#">Terms of Service</a>
                                                        </span>
                                </div>
                            </div>
                            <!--end row-->
                        </form>
                    </div>
                </div>
                <div class="col-md-6 col-lg-5">
                    <img alt="Image" class="border--round box-shadow-shallow" src="img/landing-7.jpg" />
                </div>
            </div>
            <!--end of row-->
        </div>
        <!--end of container-->
    </section>
@endsection
