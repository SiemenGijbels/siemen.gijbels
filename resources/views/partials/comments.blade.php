@if(Auth::user())
    <div class="col-md-12">
        @if(Session::has('success'))
            <div class="alert alert-success">
                {{ Session::get('success') }}
            </div>
        @endif

        {!! Form::open(array('route' => array('content.post', $post->id))) !!}

        <div class="form-group {{ $errors->has('message') ? 'has-error' : '' }}">
            {!! Form::label(trans('general.commentVerb')) !!}
            {!! Form::textarea('content', old('content'), ['class'=>'form-control form-textarea']) !!}
        </div>

        <div class="form-group">
            {!! Form::hidden('user_id', Auth::user()->id, ['class'=>'form-control']) !!}
        </div>

        <div class="form-group">
            {!! Form::hidden('post_id', $post->id, ['class'=>'form-control']) !!}
        </div>

        <div class="form-group">
            <button class="btn btn-success">@lang('general.submit')</button>
        </div>

        {!! Form::close() !!}

    </div>
@endif
@foreach($comments as $comment)
    @if($comment->post_id == $post->id)
        <div class="col-md-12 commentPost">
            <img class="commentAvatar" src="{{ asset('uploads/avatars/') }}/{{ $comment->user->avatar }}">
            <div class="commentDiv">
                <h6>{{ $comment->user->name }} — {{ $comment->created_at }}    @if(Auth::user() && Auth::user()->type == 1 || Auth::user() && Auth::user()->id == $comment->user_id)
                        <a class="deletecomment" href="{{ route('content.post.deleteComment', ['postId' => $post->id, 'commentId' => $comment->id]) }}"><i
                                    class="fas fa-trash-alt"></i></a>
                    @endif</h6>
                <p>{{ $comment->content }}</p>
            </div>
        </div>
    @endif
@endforeach