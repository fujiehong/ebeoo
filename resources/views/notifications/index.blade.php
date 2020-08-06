@extends('layouts.app')

@section('title', '我的通知')

@section('content')

    <section class="text-center">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-10 col-lg-8">
                    <h3><i class="fa fa-bell-o" aria-hidden="true"></i>  我的通知</h3>

                </div>
            </div>
            <!--end of row-->
        </div>
        <!--end of container-->
    </section>


    <section>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8 col-lg-10">
                    <hr>

                        @if ($notifications->count())


                        <ul class="results-list">

                                @foreach ($notifications as $notification)
                                    @include('notifications.types._' . Str::snake(class_basename($notification->type)))
                                @endforeach
                                    <div class="pagination">
                                        <ol>

                                {!! $notifications->render() !!}
                                        </ol>
                                    </div>


                        @else
                            <div class="empty-block">没有消息通知！</div>
                        @endif

                        </ul>



                </div>
            </div>
        </div>
    </section>



@stop
