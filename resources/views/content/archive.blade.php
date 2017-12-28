@extends('layouts.app')

@section('page_title', 'Archive Siemen Gijbels')

@section('content')
    <div class="loading">
        <h1>@lang('general.loadingblog')</h1>
    </div>
    <div class="content">
        <div class="grid">
            @foreach($posts as $post)
                <div class="grid-item">
                    <div class="col-md-12 text-center">
                        <img class="blogPics" src="https://source.unsplash.com/random"/>
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
        </div>
        <div>
            <div>
                {{ $posts->links() }}
            </div>
        </div>
    </div>

@endsection