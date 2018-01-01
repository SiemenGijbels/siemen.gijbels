@extends('layouts.app')

@section('page_title', $post->title)

@section('social_share')
    <script>
        window.fbAsyncInit = function () {
            FB.init({
                appId: '778280482363322',
                autoLogAppEvents: true,
                xfbml: true,
                version: 'v2.11'
            });
        };

        (function (d, s, id) {
            var js, fjs = d.getElementsByTagName(s)[0];
            if (d.getElementById(id)) {
                return;
            }
            js = d.createElement(s);
            js.id = id;
            js.src = "https://connect.facebook.net/en_US/sdk.js";
            fjs.parentNode.insertBefore(js, fjs);
        }(document, 'script', 'facebook-jssdk'));
    </script>
@stop

@section('content')
    <div class="content">
        <img src="{{ asset('uploads/images/') }}/{{ $post->image }}">
        <div class="row">
            <div class="col-md-12">
                <p class="quote">{{ $post->title }}</p>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <p>{{  $post->content }}</p>
            </div>
            <div class="col-md-12">
                <p><a href="">Share</a></p>
            </div>
            <div class="col-md-12">
                @if(Auth::user())
                    @if($post->user_id == Auth::user()->id || Auth::user()->type == 1)
                        <p>
                            <a href="{{ route('content.edit', ['id' => $post->id]) }}">@lang('general.edit')</a>
                        </p>
                        @if($post->archived == 0 || $post->archived == NULL)
                            <p>
                                <a href="{{ route('content.post.archive', ['id' => $post->id]) }}">@lang('general.archiveVerb')</a>
                            </p>
                            <p>
                                <a href="{{ route('content.post.softdelete', ['id' => $post->id]) }}">@lang('general.delete')</a>
                            </p>
                        @endif
                        @if($post->archived == 1)
                            <p>
                                <a href="{{ route('content.post.unarchive', ['id' => $post->id]) }}">@lang('general.unarchive')</a>
                            </p>
                            <p>
                                <a href="{{ route('content.post.softdelete', ['id' => $post->id]) }}">@lang('general.delete')</a>
                            </p>
                        @endif
                    @endif
            </div>
            @if($userLikeCount == 0 || $userLikeCount == NULL || empty($userLikeCount))
                <form action="{{ route('content.post.like', ['postId' => $post->id, 'userId' => Auth::user()->id]) }}"
                      method="post">
                    <div class="form-group">
                        <p>
                            {{ $countLikes }} Likes
                        </p>
                    </div>
                    <div class="form-group">
                        <input type="hidden" class="form-control" id="post_id" name="post_id" value="{{ $post->id }}">
                    </div>
                    <div class="form-group">
                        <input type="hidden" class="form-control" id="user_id" name="user_id"
                               value="{{ Auth::user()->id }}">
                    </div>
                    {{ csrf_field() }}
                    <button type="submit" class="btn btn-primary">@lang('general.like')</button>
                </form>
            @endif
            @if($userLikeCount == 1)
                <form>
                    <div class="form-group">
                        <p>
                            {{ $countLikes }} Likes
                        </p>
                    </div>
                    <div class="form-group">
                        <input type="hidden" class="form-control" id="post_id" name="post_id" value="{{ $post->id }}">
                    </div>
                    <div class="form-group">
                        <input type="hidden" class="form-control" id="user_id" name="user_id"
                               value="{{ Auth::user()->id }}">
                    </div>
                    {{ csrf_field() }}
                    <a class="btn btn-primary"
                       href="{{ route('content.post.unlike', ['postId' => $post->id, 'likeId' => $userLike->id]) }}">@lang('general.unlike')</a>
                </form>
            @endif
            @endif
            <button onclick="fbShare()" id="fbBtn" class="btn-default">Facebook</button>
            @include('partials.comments')
        </div>
    </div>
@stop

@section('scripts')
    <script>
        function fbShare() {
            FB.ui({
                method: 'share',
                display: 'popup',
                href: '{{ Request::url() }}',
            }, function (response) {
            });
        };
    </script>
@stop
