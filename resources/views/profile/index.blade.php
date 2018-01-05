@extends('layouts.app')

@section('page_title')
    @lang('general.profile') {{ Auth::user()->name }}
@stop

@section('content')
    <div class="loading">
        <h1>@lang('general.loadingblog')</h1>
    </div>

    {{--https://devdojo.com/episode/laravel-user-image--}}
    <div class="content">
        <div class="profileTop">
            <img class="profilePic" src="{{ asset('uploads/avatars/') }}/{{ $user->avatar  }}">
            <h1 class="tagName profileName">{{ $user->name }}</h1>
            @if($user->id == Auth::user()->id)
                <h2 class="profileSettings">
                    <a href="#" id="settingsBtn">
                        <i class="fas fa-cogs"></i>
                    </a>
                </h2>
                <br style="clear: both;">
                <div id="settings">
                    {!! Form::open(array('route' => array('profile.index.changeAvatar'), 'files' => true)) !!}

                    <div class="form-group">
                        {!! Form::label(trans('general.updateavatar')) !!}
                        {!! Form::file('avatar') !!}
                    </div>

                    <div class="form-group">
                        <button class="btn btn-success">@lang('general.submit')</button>
                    </div>

                    {!! Form::close() !!}
                </div>
            @endif
        </div>
        <div class="grid">
            @if($user->id == Auth::user()->id)
                @foreach($ownPosts as $ownPost)
                    @if($ownPost->archived == 0 || $ownPost->archived == NULL)
                        @include('partials.ownPost')
                    @elseif($ownPost->archived == 1)
                        @include('partials.ownPostArchived')
                    @endif
                @endforeach
            @endif
            @if($user->id != Auth::user()->id)
                @foreach($posts as $post)
                    @if($post->archived == 0 || $post->archived == NULL)
                        @include('partials.post')
                    @endif
                @endforeach
            @endif
        </div>
        <div>
            <div style="text-align: center">
                {{ $posts->links() }}
            </div>
        </div>
    </div>

@endsection

@section('scripts')
    <script src="{{ asset('js/masonry.pkgd.min.js') }}" type="text/javascript"></script>
    <script>
        $('#settingsBtn').on('click', function () {
            $('#settings').slideToggle();
        });
    </script>
    <script>
        $('.blogPics').on('load', function () {
            $('.grid').masonry({
                itemSelector: '.grid-item'
            });
            $('.loading').fadeOut();
        });
    </script>
    <script>
        @if($posts->count() == 0 || $posts->count() == NULL)
        $(window).on('load', function () {
            $('.loading').fadeOut();
        });
        @endif
    </script>
    {{--https://github.com/lokesh/color-thief/--}}
    <script type="text/javascript" defer src="{{ asset('js/color-thief.min.js') }}"></script>
    <script>
        @foreach($posts as $post)
        @if($post->tags->count() > 1)
        $(document).ready(function () {
            var sourceImage = document.getElementById('photo{{ $post->id }}');
            var colorThief = new ColorThief();
            var obj = $("#grid-item{{ $post->id }} .grid-item-content .tagblock");
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
        @endforeach
    </script>
@stop