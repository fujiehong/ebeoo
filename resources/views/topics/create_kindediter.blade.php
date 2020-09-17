@extends('layouts.app')


@section('title', $topic->title)
@section('description', $topic->excerpt)
@section('content')
    <section class="bg--secondary space--sm">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
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
                                <form name="edit" action="{{ route('topics.update', $topic->id) }}" method="POST" accept-charset="UTF-8" enctype="multipart/form-data">
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

                                            <!--div class="col-md-12">

                                                <input id="input-id" type="file" class="file" name="video" >

                                            </div-->



                                            <div class="col-md-12">
                                                <textarea name="body"  id="editor" rows="6"  placeholder="请填入至少三个字符的内容。">{{ old('body', $topic->body ) }}</textarea>
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
    <link rel="stylesheet" type="text/css" media="all" href="{{URL::asset('js/kindeditor/themes/default/default.css')}}" />
    <link rel="stylesheet" type="text/css" media="all" href="{{URL::asset('js/kindeditor/plugins/code/prettify.css')}}" />




@stop

@section('scripts')




    <!-- 编辑器源码文件 -->
    <script type="text/javascript" src="{{ URL::asset('js/kindeditor/kindeditor-all.js') }}"></script>
    <!-- 配置语言文件 -->
    <script type="text/javascript" src="{{ URL::asset('js/kindeditor/lang/zh-CN.js') }}"></script>



    <script type="text/javascript">


        KindEditor.ready(function(K) {
            var editor1 = K.create('textarea[name="body"]', {
                cssPath : "{{URL::asset('js/kindeditor/plugins/code/prettify.css')}}",
                uploadJson : "{{ route('topics.uploadKindeditorImage',array('_token'=>csrf_token())) }}",

                allowFileManager : false,
                autoHeightMode : true,
                //loadStyleMode : false,
                themeType : 'simple',

            });
            //prettyPrint();
        });



    </script>
@stop


