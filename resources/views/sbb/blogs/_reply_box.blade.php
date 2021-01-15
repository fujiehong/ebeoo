<div class="comments-form">
    <h3>Leave a comment</h3>

    <form class="row" action="{{ route('replies.store') }}" method="POST" accept-charset="UTF-8">

        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <input type="hidden" name="topic_id" value="{{ $blog->id }}">
        @include('shared._error')

        <div class="col-12 ">

            <textarea rows="4" name="content" placeholder="分享你的见解~"></textarea>
        </div>
        <div class="col-md-3">
            <button class="btn  btn--primary" type="submit">{{__('Submit Comment')}}</button>
        </div>
    </form>
</div>
