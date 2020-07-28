@foreach (['danger', 'warning', 'success', 'info'] as $msg)
    @if(session()->has($msg))

        <div class="notification pos-right pos-top" data-animation="from-top" data-autoshow="200">
            <div class="boxed boxed--border border--round box-shadow">
                <div class="text-block">
                    <h5>Notification</h5>
                    <p>
                        {{ session()->get($msg) }}
                    </p>
                </div>
            </div>
        </div>
    @endif
@endforeach




