@extends('layouts.app')

@section('page_title', 'Blog Siemen Gijbels')

@section('content')
    <div class="loading">
        <h1>@lang('general.loadingblog')</h1>
    </div>
    <div class="content">
        <div class="grid">
            @foreach($posts as $post)
                <a class="grid-link" href="{{ route('content.post', ['id' => $post->id]) }}">
                    <div class="grid-item text-center">
                        @if(!$post->image == "")
                            <img class="blogPics" src="{{ asset('uploads/images/') }}/{{ $post->image }}">
                        @else
                            <img class="blogPics" src="https://source.unsplash.com/random"/>
                        @endif
                        <div class="grid-item-content">
                            <img class="blogPics blogPicProfile"
                                 src="{{ asset('uploads/avatars/') }}/{{ empty($post->user->avatar) ? 'default.png' : $post->user->avatar }}">
                            <p class="byUser">@lang('general.by') {{ empty($post->user->name) ? 'No user' : $post->user->name }}</p>
                            <h1 class="post-title">{{ $post->title }}</h1>
                            @foreach($post->tags as $tag)
                                <span class="tagblock">{{ $tag->name }}</span>
                            @endforeach
                            <p class="indexContent">{{ $post->content }}</p>
                        </div>
                    </div>
                </a>
            @endforeach
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
@stop