@extends('layouts.app')

@section('page_title', 'Blog Siemen Gijbels')

@section('open_graph')
    <meta property="og:site_name" content="Laravel blog Siemen Gijbels"/>
    <meta property="og:title" content="Blog Siemen Gijbels"/>
    <meta property="og:description" content="Blog Siemen Gijbels"/>
    <meta property="og:image" content="{{ asset('uploads/images/default.jpg') }}">
    <meta property="og:url" content="{{ Request::url() }}">
@stop

@section('content')
    <div class="loading">
        <h1>@lang('general.loadingblog')</h1>
    </div>
    <div class="content">
        <div class="profileTop">
            <h1 class="tagName">{{ $tag->name }}</h1>
        </div>
        <div class="grid">
            @foreach($blogPosts as $blogPost)
                @include('partials.blogPost')
            @endforeach
        </div>
    </div>

@stop

@section('scripts')
    <script src="{{ asset('js/masonry.pkgd.min.js') }}" type="text/javascript"></script>
    <script>
        $('.blogPics').on('load', function () {
            $('.grid').masonry({
                itemSelector: '.grid-item'
            });
            $('.loading').fadeOut();
        });
    </script>

    {{--https://github.com/lokesh/color-thief/--}}
    <script type="text/javascript" defer src="{{ asset('js/color-thief.min.js') }}"></script>
    <script>
        @foreach($blogPosts as $blogPost)
        @if($blogPost->tags->count() > 1)
        $(document).ready(function () {
            var sourceImage = document.getElementById('photo{{ $blogPost->id }}');
            var colorThief = new ColorThief();
            var obj = $("#grid-item{{ $blogPost->id }} .grid-item-content .tagblock");
            var tagArray = $.makeArray(obj);
            var colorPalette = colorThief.getPalette(sourceImage, '{{ $blogPost->tags->count() }}');
            for (var i = 0; i < tagArray.length; i++) {
                $(tagArray[i]).css("background-color", "rgb(" + colorPalette[i] + ")");
            }
            ;
        });
        @elseif($blogPost->tags->count() == 1)
        $(document).ready(function () {
            var sourceImage = document.getElementById('photo{{ $blogPost->id }}');
            var colorThief = new ColorThief();
            var color = colorThief.getColor(sourceImage);
            $("#grid-item{{ $blogPost->id }} .grid-item-content .tagblock").css("background-color", "rgb(" + color + ")");
        });
        @endif
        @endforeach
    </script>
@stop