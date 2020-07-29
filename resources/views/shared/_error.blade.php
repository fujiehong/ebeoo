@if (count($errors) > 0)

    <div class="col-md-12">
    <div class="alert bg--error">
        <div class="alert__body">

            @foreach ($errors->all() as $error)

                <span><li> {{ $error }}</li></span>
            @endforeach

        </div>
        <div class="alert__close">&times;</div>
    </div>
    </div>
@endif
