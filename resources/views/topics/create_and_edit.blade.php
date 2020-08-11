@extends('layouts.app')


@section('title', $topic->title)
@section('description', $topic->excerpt)
@section('content')
    <section class="bg--secondary space--sm">
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="boxed boxed--lg boxed--border">
                        <div class="text-block text-center">
                            <img alt="{{ Auth::user()->name }}" src="{{Auth::user()->avatar}}" class="image--sm" />
                            <span class="h4"><strong>{{Auth::user()->name}}</strong></span>
                            <span>{{Auth::user()->introduction}}</span>
                            <span class="label">作者</span>
                        </div>
                        <hr>
                        <div class="text-block">
                            <ul class="menu-vertical">
                                <li>
                                    <a href="#" data-toggle-class=".account-tab:not(.hidden);hidden|#account-profile;hidden">编辑个人资料</a>
                                </li>
                                <li>
                                    <a href="#" data-toggle-class=".account-tab:not(.hidden);hidden|#account-notifications;hidden">Email Notifications</a>
                                </li>
                                <li>
                                    <a href="#" data-toggle-class=".account-tab:not(.hidden);hidden|#account-billing;hidden">Billing Details</a>
                                </li>
                                <li>
                                    <a href="#" data-toggle-class=".account-tab:not(.hidden);hidden|#account-password;hidden">修改密码</a>
                                </li>
                                <li>
                                    <a href="#" data-toggle-class=".account-tab:not(.hidden);hidden|#account-delete;hidden">Delete Account</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-9">
                    <div class="boxed boxed--lg boxed--border">
                        <div class="col-md-10 col-lg-12">

                                <h3 class="">
                                    <i class="fa fa-edit"></i>

                                    @if($topic->id)
                                        编辑话题
                                    @else
                                        新建话题
                                    @endif
                                </h3>

                                <hr>

                            @if($topic->id)
                                <form action="{{ route('topics.update', $topic->id) }}" method="POST" accept-charset="UTF-8" enctype="multipart/form-data">
                                    <input type="hidden" name="_method" value="PUT">
                                    @else
                                        <form action="{{ route('topics.store') }}" method="POST" accept-charset="UTF-8">
                                            @endif

                                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                            <div class="col-md-12">
                                            @include('shared._error')
                                            </div>


                                            <div class="col-md-12">
                                                <input class="form-control" type="text" name="title" value="{{ old('title', $topic->title ) }}" placeholder="请填写标题" required />
                                            </div>
                                            <div class="col-md-12">
                                                <div class="input-select">
                                                    <select  required name="category_id"   >
                                                        <option value="" hidden disabled {{ $topic->id ? '' : 'selected' }}>请选择分类</option>
                                                        @foreach ($categories as $value)
                                                            <option value="{{ $value->id }}" {{ $topic->category_id == $value->id ? 'selected' : '' }}>{{ $value->name }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="col-md-12">

                                                <input id="input-id" type="file" class="file" name="video" >

                                            </div>



                                            <div class="col-md-12">
                                                <textarea name="body"  id="editor" rows="6" placeholder="请填入至少三个字符的内容。" required>{{ old('body', $topic->body ) }}</textarea>
                                            </div>

                                            <div class="col-md-4">
                                                <button type="submit" class="btn btn--primary">
                                                    保存
                                                        </button>
                                            </div>
                                        </form>



                        </div>


                    </div>
                </div>
            </div>
            {{--end row--}}
        </div>
        {{--end container--}}
    </section>
    {{--end section--}}



@endsection

@section('styles')

    <link rel="stylesheet" type="text/css" media="all" href="{{URL::asset('css/simditor.css')}}" />
    <link rel="stylesheet" type="text/css" media="all" href="{{URL::asset('css/fileinput.css')}}"/>
@stop

@section('scripts')
    <script type="text/javascript" src="{{ URL::asset('js/module.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('js/hotkeys.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('js/uploader.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('js/simditor.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('js/fileinput.js') }}"></script>

    <script>

        $(document).ready(function() {
            var editor = new Simditor({
                textarea: $('#editor'),
                upload: {
                    url: '{{ route('topics.upload_image') }}',
                    params: {
                        _token: '{{ csrf_token() }}'
                    },
                    fileKey: 'upload_file',
                    connectionCount: 3,
                    leaveConfirm: '文件上传中，关闭此页面将取消上传。'
                },
                pasteImage: true,
                toolbar:[

                    'bold',
                    'italic',
                    'underline',
                    'strikethrough',
                    'fontScale',
                    'color',
                    'blockquote',
                    'code',
                    'table',
                    'link',
                    'image',
                    'hr',
                    'indent',
                    'outdent',
                    'alignment',
                ],
            });

            
        });


    </script>
@stop

