@if(Auth::user())
    <div class="col-md-12">
        <form action="{{ route('content.post', ['id' => $post->id]) }}" method="post">
            <div class="form-group">
                <label for="content">@lang('general.commentVerb')</label>
                <input type="text" class="form-control" id="content" name="content">
            </div>
            <div class="form-group">
                <input type="hidden" class="form-control" id="user_id" name="post_id" value="{{ $post->id }}">
            </div>
            <div class="form-group">
                <input type="hidden" class="form-control" id="user_id" name="user_id"
                       value="{{ Auth::user()->id }}">
            </div>
            {{ csrf_field() }}
            <button type="submit" class="btn btn-primary">@lang('general.submit')</button>
        </form>
    </div>
@endif
@foreach($comments as $comment)
    @if($comment->post_id == $post->id)
        <div class="col-md-12 commentPost">
            <img class="commentAvatar" src="{{ asset('uploads/avatars/') }}/{{ $comment->user->avatar }}">
            <div class="commentDiv">
                <h6>{{ $comment->user->name }} — {{ $comment->created_at }}</h6>
                <p>{{ $comment->content }}</p>
                @if(Auth::user() && Auth::user()->type == 1 || Auth::user() && Auth::user()->id == $comment->user_id)
                    <a href="{{ route('content.post.deleteComment', ['postId' => $post->id, 'commentId' => $comment->id]) }}"><i
                                class="fas fa-trash-alt"></i></a>
                @endif
            </div>
        </div>
    @endif
@endforeach