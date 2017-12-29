@extends('layouts.app')

@section('page_title', Auth::user()->name)

@section('content')
    <div class="loading">
        <h1>@lang('general.loadingblog')</h1>
    </div>

    {{--https://devdojo.com/episode/laravel-user-image--}}
    <div class="content">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <img src="{{ asset('uploads/avatars/') }}/{{ Auth::user()->avatar  }}" style="width:150px; height:150px; float:left; border-radius:50%; margin-right:25px;">
                <h2>{{ Auth::user()->name }}</h2>
                <form enctype="multipart/form-data" action="{{ route('profile.index.changeAvatar') }}" method="POST">
                    <label>Update Profile Image</label>
                    <input type="file" name="avatar">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <input type="submit" class="pull-right btn btn-sm btn-primary">
                </form>
            </div>
        </div>
        <div class="grid">
            @foreach($posts as $post)
                @if($post->user_id == Auth::user()->id)
                    @if($post->archived == 0 || $post->archived == NULL)
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
                                <p>
                                    <a href="{{ route('content.post', ['id' => $post->id]) }}">@lang('general.moredetails')</a>
                                </p>
                            </div>
                        </div>
                    @else
                        <div class="grid-item">
                            <div class="col-md-12 text-center">
                                    <img class="blogPics archived" src="https://source.unsplash.com/random"/>
                                <h1 class="post-title">{{ $post->title }}</h1>
                                <p style="font-weight: bold">
                                    @foreach($post->tags as $tag)
                                        {{ $tag->name }}
                                    @endforeach
                                </p>
                                <p class="archivedtext">This post is archived</p>
                                <p>{{ $post->content }}!</p>
                                <p>
                                    <a href="{{ route('content.post', ['id' => $post->id]) }}">@lang('general.moredetails')</a>
                                </p>
                            </div>
                        </div>
                    @endif
                @endif
            @endforeach
        </div>
        <div>
            <div>
                {{ $posts->links() }}
            </div>
        </div>
    </div>

@endsection