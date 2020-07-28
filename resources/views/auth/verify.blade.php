@extends('layouts.app')

@section('content')
    <section class="height-100 text-center">
        <div class="container pos-vertical-center">
            <div class="row">
                <div class="col-md-7 col-lg-5">
                    <h2>{{ __('Verify Your Email Address') }}</h2>
                    <p class="lead">

                    @if (session('resent'))
                        <div class="alert bg--success">
                            <div class="alert__body">
                                <span>{{ __('A fresh verification link has been sent to your email address.') }}</span>
                            </div>
                            <div class="alert__close">&times;</div>
                        </div>

                    @endif

                    {{ __('Before proceeding, please check your email for a verification link.') }}
                    {{ __('If you did not receive the email') }},
                    <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                        @csrf
                        <button type="submit" class="btn btn--primary type--uppercase">{{ __('click here to request another') }}</button>.
                    </form>
                    </p>

                    <span class="type--fine-print block">Dont have an account yet?
                                <a href="#">Create account</a>
                            </span>
                </div>
            </div>
            <!--end of row-->
        </div>
        <!--end of container-->
    </section>


@endsection
