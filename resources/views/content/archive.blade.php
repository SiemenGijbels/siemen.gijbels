@extends('layouts.app')

@section('page_title', 'Archive Siemen Gijbels')

@section('content')
    <div class="loading">
        <h1>@lang('general.loadingblog')</h1>
    </div>
    <div class="content">
        <div class="grid">
            @if($posts->count() == 0 || $posts->count() == NULL)
                <div class="col-md-12 text-center">
                    <h1>No archived posts yet!</h1>
                </div>
            @else
            @foreach($posts as $post)
                <div class="grid-item">
                    <div class="col-md-12 text-center">
                        @if(!$post->image == "")
                            <img class="blogPics" src="{{ asset('uploads/images/') }}/{{ $post->image }}">
                        @else
                            <img class="blogPics" src="https://source.unsplash.com/random"/>
                        @endif
                        <h1 class="post-title">{{ $post->title }}</h1>
                        <p style="font-weight: bold">
                            @foreach($post->tags as $tag)
                                {{ $tag->name }}
                            @endforeach
                        </p>
                        <p>{{ $post->content }}!</p>
                        <p><a href="{{ route('content.post', ['id' => $post->id]) }}">@lang('general.moredetails')</a></p>
                    </div>
                </div>
            @endforeach
            @endif
        </div>
        <div>
            <div>
                {{ $posts->links() }}
            </div>
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
    <script>
        @if($posts->count() == 0 || $posts->count() == NULL)
        $(window).on('load', function () {
            $('.loading').fadeOut();
        });
        @endif
    </script>
@stop