@extends('layouts.app')

@section('page_title', $post->title)

@section('social_share')
    <div id="fb-root"></div>
    <script>(function (d, s, id) {
            var js, fjs = d.getElementsByTagName(s)[0];
            if (d.getElementById(id)) return;
            js = d.createElement(s);
            js.id = id;
            js.src = 'https://connect.facebook.net/{{ app()->getLocale() }}/sdk.js#xfbml=1&version=v2.11&appId=778280482363322';
            fjs.parentNode.insertBefore(js, fjs);
        }(document, 'script', 'facebook-jssdk'));</script>
    <script>
        window.twttr = (function (d, s, id) {
            var js, fjs = d.getElementsByTagName(s)[0],
                t = window.twttr || {};
            if (d.getElementById(id)) return t;
            js = d.createElement(s);
            js.id = id;
            js.src = "https://platform.twitter.com/widgets.js";
            fjs.parentNode.insertBefore(js, fjs);

            t._e = [];
            t.ready = function (f) {
                t._e.push(f);
            };

            return t;
        }(document, "script", "twitter-wjs"));
    </script>
    <script>
        window.pAsyncInit = function () {
            PDK.init({
                appId: "<your app-id>", // Change this
                cookie: true
            });
        };

        (function (d, s, id) {
            var js, pjs = d.getElementsByTagName(s)[0];
            if (d.getElementById(id)) {
                return;
            }
            js = d.createElement(s);
            js.id = id;
            js.src = "//assets.pinterest.com/sdk/sdk.js";
            pjs.parentNode.insertBefore(js, pjs);
        }(document, 'script', 'pinterest-jssdk'));
    </script>
    <script type="text/javascript" async defer src="{{ asset('js/pinit.js') }}"></script>
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
            <div class="col-md-12 socialshare">
                <div class="fb-share-button" data-href="{{ Request::url() }}" data-layout="button_count"
                     data-size="small" data-mobile-iframe="true"><a class="fb-xfbml-parse-ignore" target="_blank"
                                                                    href="https://www.facebook.com/sharer/sharer.php?u="
                                                                    . {{ urlencode(Request::url()) }}>Share</a></div>
                <a class="twitter-share-button" href="https://twitter.com/intent/tweet">Tweet</a>
                <a class="redditLink" href="//www.reddit.com/submit"
                   onclick="window.location = '//www.reddit.com/submit?url=' + encodeURIComponent(window.location); return false">
                    @if(app()->getLocale() == 'en_US')
                        <img id="redditBtn" src="{{ asset('uploads/images/redditbutton.png') }}"
                             alt="submit to reddit"
                             border="0"/>
                    @elseif(app()->getLocale() == 'nl_NL')
                        <img id="redditBtn" src="{{ asset('uploads/images/redditbutton_nl.png') }}"
                             alt="post op reddit"
                             border="0"/>
                    @endif
                </a>
                <a class="pinterestBtn" href="https://www.pinterest.com/pin/create/button/"
                   data-pin-do="buttonBookmark"></a>
                <script src="//platform.linkedin.com/in.js"
                        type="text/javascript"> lang: {{ app()->getLocale() }}</script>
                <script type="IN/Share" data-url="{{ Request::url() }}"></script>
            </div>
            @include('partials.comments')
        </div>
    </div>
@stop