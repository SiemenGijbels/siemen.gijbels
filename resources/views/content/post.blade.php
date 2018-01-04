@extends('layouts.app')

@section('page_title', $post->title)

@section('open_graph')
    <meta property="og:site_name" content="Laravel blog Siemen Gijbels"/>
    <meta property="og:title" content="{{ $post->title }}"/>
    <meta property="og:description" content="{{ $post->content }}"/>
    <meta property="og:image" content="{{ $post->image }}">
    <meta property="og:url" content="{{ Request::url() }}">
@stop

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

@section('head_scripts')

@stop

@section('content')
    <div class="content">
        <div class="left">
            <div class="imageDiv">
                <img id="photo{{ $post->id }}" class="postImg" src="{{ asset('uploads/images/') }}/{{ $post->image }}">
            </div>
        </div>
        <div class="right">
            <div class="row">
                <div class="col-md-12 post-title">
                    <h1 class="titlePost">{{ $post->title }}</h1>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 tags">
                    @foreach($post->tags as $tag)
                        <a class="tagblock" href="{{ route('content.sortByTag', ['name' => $tag->name]) }}">#{{ $tag->name }}</a>
                    @endforeach
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 post-content">
                    <h5>{{  $post->user->name }} — {{ $post->created_at }}</h5>
                    <p>{{  $post->content }}</p>
                </div>
                @if(Auth::check())
                    <div class="col-md-12 like">
                        @if($userLikeCount == 0 || $userLikeCount == NULL || empty($userLikeCount))

                            {!! Form::open(array('route' => array('content.post.like', $post->id, Auth::user()->id))) !!}

                            <div class="form-group-like">
                                <p>{{ $countLikes }} <i class="fas fa-thumbs-up"></i></p>
                            </div>

                            <div class="form-group-like">
                                <button class="btn btn-primary btn-like"><i class="far fa-thumbs-up"></i></button>
                            </div>


                            <div class=" form-group">
                                {!! Form::hidden('post_id', $post->id, ['class'=>'form-control']) !!}
                            </div>

                            <div class=" form-group">
                                {!! Form::hidden('user_id', Auth::user()->id, ['class'=>'form-control']) !!}
                            </div>

                            {!! Form::close() !!}

                        @endif
                        @if($userLikeCount == 1)
                            <form>
                                <div class="form-group-like">
                                    <p>{{ $countLikes }} <i class="fas fa-thumbs-up"></i></p>
                                </div>
                                <div class="form-group-like">
                                    <a class="btn btn-primary btn-like"
                                       href="{{ route('content.post.unlike', ['postId' => $post->id, 'likeId' => $userLike->id]) }}"><i
                                                class="far fa-thumbs-down"></i></a>
                                </div>

                                <div class="form-group">
                                    <input type="hidden" class="form-control" id="post_id" name="post_id"
                                           value="{{ $post->id }}">
                                </div>
                                <div class="form-group">
                                    <input type="hidden" class="form-control" id="user_id" name="user_id"
                                           value="{{ Auth::user()->id }}">
                                </div>
                                {{ csrf_field() }}
                            </form>
                        @endif
                    </div>
                    <div class="col-md-12 socialshare">
                        <div class="fb-share-button" data-href="{{ Request::url() }}" data-layout="button_count"
                             data-size="small" data-mobile-iframe="true"><a class="fb-xfbml-parse-ignore"
                                                                            target="_blank"
                                                                            href="https://www.facebook.com/sharer/sharer.php?u="
                                                                            . {{ urlencode(Request::url()) }}>Share</a>
                        </div>
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
                    <div class="col-md-12 post-actions">
                        @if($post->user_id == Auth::user()->id || Auth::user()->type == 1)
                            <a class="action-link" href="{{ route('content.edit', ['id' => $post->id]) }}"><i
                                        class="fas fa-pencil-alt"></i></a>
                            @if($post->archived == 0 || $post->archived == NULL)
                                <a class="action-link"
                                   href="{{ route('content.post.archive', ['id' => $post->id]) }}"><i
                                            class="fas fa-archive"></i></a>
                                <a class="action-link"
                                   href="{{ route('content.post.softdelete', ['id' => $post->id]) }}"><i
                                            class="fas fa-trash-alt"></i></a>
                            @endif
                            @if($post->archived == 1)
                                <a class="action-link"
                                   href="{{ route('content.post.unarchive', ['id' => $post->id]) }}"><i
                                            class="fas fa-th"></i></a>
                                <a class="action-link"
                                   href="{{ route('content.post.softdelete', ['id' => $post->id]) }}"><i
                                            class="fas fa-trash-alt"></i></a>
                            @endif
                        @endif
                    </div>
                @elseif(!Auth::check())
                    <div class="col-md-12 like">
                        <p>{{ $countLikes }} <i class="fas fa-thumbs-up"></i></p>
                    </div>
                    <div class="col-md-12 socialshare notloggedin">
                        <div class="fb-share-button" data-href="{{ Request::url() }}" data-layout="button_count"
                             data-size="small" data-mobile-iframe="true"><a class="fb-xfbml-parse-ignore"
                                                                            target="_blank"
                                                                            href="https://www.facebook.com/sharer/sharer.php?u="
                                                                            . {{ urlencode(Request::url()) }}>Share</a>
                        </div>
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
                @endif
                @include('partials.comments')
            </div>
        </div>
    </div>
@stop

@section('scripts')
    <script type="text/javascript" src="{{ asset('js/color-thief.min.js') }}"></script>
    <script>
        $(document).ready(function () {
            var sourceImage = document.getElementById("photo{{ $post->id }}");
            var colorThief = new ColorThief();
            var color = colorThief.getColor(sourceImage);
            $(".action-link").css("color", "rgb(" + color + ")");
            $(".deletecomment").css("color", "rgb(" + color + ")");
            $(".btn-success").css("background-color", "rgb(" + color + ")");
            $(".btn-like").css("background-color", "rgb(" + color + ")");
        });
    </script>
    {{--https://github.com/lokesh/color-thief/--}}
    <script type="text/javascript" defer src="{{ asset('js/color-thief.min.js') }}"></script>
    <script>
        @if($post->tags->count() > 1)
        $(document).ready(function () {
            var sourceImage = document.getElementById('photo{{ $post->id }}');
            var colorThief = new ColorThief();
            var obj = $(".tagblock");
            var tagArray = $.makeArray(obj);
            var colorPalette = colorThief.getPalette(sourceImage, '{{ $post->tags->count() }}');
            for (var i = 0; i < tagArray.length; i++) {
                $(tagArray[i]).css("background-color", "rgb(" + colorPalette[i] + ")");
            }
            ;
        });
        @elseif($post->tags->count() == 1)
        $(document).ready(function () {
            var sourceImage = document.getElementById('photo{{ $post->id }}');
            var colorThief = new ColorThief();
            var color = colorThief.getColor(sourceImage);
            $("#grid-item{{ $post->id }} .grid-item-content .tagblock").css("background-color", "rgb(" + color + ")");
        });
        @endif
    </script>
@stop