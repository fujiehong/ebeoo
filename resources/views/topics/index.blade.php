@extends('layouts.app')
@section('title', '列表')
@section('content')
    <section class="space--sm">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-lg-9">
                    <div class="masonry">
                        <div class="masonry-filter-container d-flex align-items-center">
                            <span>Category:</span>
                            <div class="masonry-filter-holder">
                                <div class="masonry__filters" data-filter-all-text="所有分类"></div>

                            </div>
                        </div>
                        <hr>
                        <div class="masonry__container row">

                            {{-- 列表 --}}
                            @include('topics._topic_list', ['topics' => $topics])
                        </div>
                        <!--end of masonry container-->
                        {{-- 分页 --}}


                        <div class="pagination">
                            <ol>
                                {!! $topics->appends(Request::except('page'))->render() !!}
                            </ol>
                        </div>
                    </div>
                    <!--end masonry-->
                </div>
                {{--右边导航栏--}}
                <div class="col-lg-3 hidden-sm">
                    <div class="sidebar boxed boxed--border boxed--lg bg--secondary">
                        @include('topics._sidebar')

                    </div>
                </div>
            </div>
            <!--end of row-->
        </div>
        <!--end of container-->
    </section>

<!--div class="container">
  <div class="col-md-10 offset-md-1">
    <div class="card ">
      <div class="card-header">
        <h1>
          Topic
          <a class="btn btn-success float-xs-right" href="{{ route('topics.create') }}">Create</a>
        </h1>
      </div>

      <div class="card-body">
        @if($topics->count())
          <table class="table table-sm table-striped">
            <thead>
              <tr>
                <th class="text-xs-center">#</th>
                <th>Title</th> <th>Body</th> <th>User_id</th> <th>Category_id</th> <th>Reply_count</th> <th>View_count</th> <th>Last_reply_user_id</th> <th>Order</th> <th>Excerpt</th> <th>Slug</th>
                <th class="text-xs-right">OPTIONS</th>
              </tr>
            </thead>

            <tbody>
              @foreach($topics as $topic)
              <tr>
                <td class="text-xs-center"><strong>{{$topic->id}}</strong></td>

                <td>{{$topic->title}}</td> <td>{{$topic->body}}</td> <td>{{$topic->user_id}}</td> <td>{{$topic->category_id}}</td> <td>{{$topic->reply_count}}</td> <td>{{$topic->view_count}}</td> <td>{{$topic->last_reply_user_id}}</td> <td>{{$topic->order}}</td> <td>{{$topic->excerpt}}</td> <td>{{$topic->slug}}</td>

                <td class="text-xs-right">
                  <a class="btn btn-sm btn-primary" href="{{ route('topics.show', $topic->id) }}">
                    V
                  </a>

                  <a class="btn btn-sm btn-warning" href="{{ route('topics.edit', $topic->id) }}">
                    E
                  </a>

                  <form action="{{ route('topics.destroy', $topic->id) }}" method="POST" style="display: inline;" onsubmit="return confirm('Delete? Are you sure?');">
                    {{csrf_field()}}
                    <input type="hidden" name="_method" value="DELETE">

                    <button type="submit" class="btn btn-sm btn-danger">D </button>
                  </form>
                </td>
              </tr>
              @endforeach
            </tbody>
          </table>
          {!! $topics->render() !!}
        @else
          <h3 class="text-xs-center alert alert-info">Empty!</h3>
        @endif
      </div>
    </div>
  </div>
</div-->

@endsection
