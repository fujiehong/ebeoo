@extends('layouts.app')

@section('content')

    <section class="height-90 text-center">
        <div class="container pos-vertical-center">
            <div class="row">
                <div class="col-md-7 col-lg-5">
                    <h2>{{ __('Recover your account') }}</h2>
                    <p class="lead">
                        {{ __('Enter email address to send a recovery email.') }}
                    </p>
                    @if (session('status'))

                        <div class="alert bg--success">
                            <div class="alert__body">
                                <span>{{ session('status') }}</span>
                            </div>
                            <div class="alert__close">&times</div>
                        </div>
                    @endif
                    <form method="POST" action="{{ route('password.email') }}">
                        @csrf
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" placeholder="Email Address" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                        @error('email')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                        <button class="btn btn--primary type--uppercase" type="submit">{{ __('Send Password Reset Link') }}</button>
                    </form>
                    <span class="type--fine-print block">Dont have an account yet?
                                <a href="{{route('register')}}">{{ __('Register') }}</a>
                            </span>
                </div>
            </div>
            <!--end of row-->
        </div>
        <!--end of container-->
    </section>



@endsection
