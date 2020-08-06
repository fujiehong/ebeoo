@foreach (['danger', 'warning', 'success', 'info'] as $msg)

    @if(session()->has($msg))



        <div class="notification pos-right pos-top col-md-6 col-lg-5" data-notification-link="trigger" data-animation="from-top" data-autoshow="1000" data-autohide="2000">
            <div class="boxed boxed--border border--round box-shadow">
                    {{ session()->get($msg) }}
            </div>
        </div>
    @endif
@endforeach




