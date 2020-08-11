@extends('layouts.app')

@section('title', '我的通知')

@section('content')
    <section class="bg--secondary space--sm">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-10">


                    <div class="boxed boxed--border">
                        <h3><i class="fa fa-bell-o" aria-hidden="true"></i>  我的通知</h3>
                        <hr>

                        @if ($notifications->count())

                            <ul >
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
                        <ul>




                        </ul>

                    </div>
                </div>
            </div>
        </div>
    </section>


@stop
