@extends('layouts.app')

@section('content')


    <section class="text-center ">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-10 col-lg-8">
                    <div class="boxed boxed--lg bg--secondary subscribe-form-1 boxed--border">
                        <h3>{{ __('Reset Password') }}</h3>

                        <div class="row justify-content-center no-gutters">
                            <div class="col-md-8 text-left">
                                <form method="POST" action="{{ route('password.update') }}" data-success="Thanks for signing up.  Please check your inbox for a confirmation email." data-error="Please provide your name and email address and agree to the terms.">
                                    @csrf
                                    <input type="hidden" name="token" value="{{ $token }}">


                                    <input id="email" type="email" class=" form-control @error('email') is-invalid @enderror" placeholder="Email" name="email" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus>

                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror



                                    <input id="password" type="password" placeholder="{{ __('Password') }}" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror

                                    <input id="password-confirm" type="password" placeholder="{{ __('Confirm Password') }}" class="validate-required" name="password_confirmation" required autocomplete="new-password">



                                    <button type="submit" class="btn btn--primary type--uppercase">{{ __('Reset Password') }}</button>

                                </form>
                            </div>
                        </div>
                        <!--end of row-->
                    </div>
                </div>
            </div>
            <!--end of row-->
        </div>
        <!--end of container-->
    </section>



@endsection
