<div class="comments-form">
    <h4>Leave a comment</h4>
    <form class="row" action="{{ route('replies.store') }}" method="POST" accept-charset="UTF-8">

        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <input type="hidden" name="topic_id" value="{{ $topic->id }}">

        <div class="col-12 ">

            <textarea rows="4" name="Message" placeholder="分享你的见解~"></textarea>
        </div>
        <div class="col-md-3">
            <button class="btn  btn--primary" type="submit">评论</button>
        </div>
    </form>
</div>
{{--end Leave a comment --}}
