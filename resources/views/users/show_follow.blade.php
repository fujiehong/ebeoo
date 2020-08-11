@extends('layouts.app')

@section('title', $title)

@section('content')

    <section class="bg--secondary space--sm">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">


                    <div class="boxed boxed--border">
                        <h3>{{ $title }}</h3>
                        <hr>

                        @if ($users->count())

                            <ul >
                                @foreach ($users as $user)

                                    <li class="clearfix">
                                        <div class="row">
                                            <div class="col-lg-2 col-4 text-center">
                                                <div class="comment__avatar">
                                                    <a href="{{ route('users.show', $user->id) }}">
                                                        <img class="image--xs mr-2" alt="{{ $user->name }}" src="{{ $user->avatar }}"  />

                                                    </a>

                                                </div>

                                            </div>
                                            <div class="col-lg-8 col-6">
                                                <a href="{{ route('users.show', $user->id) }}"> {{ $user->name }} </a>
                                                <p>{{$user->introduction}}</p>

                                            </div>
                                            <div class="col-lg-2 col-2">
                                                @can('follow', $user)
                                                @if (Auth::user()->isFollowing($user->id))
                                                    <form action="{{ route('followers.destroy', $user->id) }}" method="post">
                                                        {{ csrf_field() }}
                                                        {{ method_field('DELETE') }}
                                                        <button type="submit" class="btn btn--xs btn-outline-primary  ">取消关注</button>
                                                    </form>
                                                @else
                                                    <form action="{{ route('followers.store', $user->id) }}" method="post">
                                                        {{ csrf_field() }}
                                                        <button type="submit" class="btn btn--xs   btn-primary">关注</button>
                                                    </form>
                                                @endif
                                                    @endcan

                                            </div>
                                        </div>
                                        <hr>
                                    </li>

                                @endforeach
                                <div class="pagination">
                                    <ol>

                                        {!! $users->render() !!}
                                    </ol>
                                </div>


                                @else
                                    <div class="empty-block">没有数据!</div>
                                @endif
                                <ul>




                                </ul>

                    </div>
                </div>
            </div>
        </div>
    </section>










@endsection
