@extends('layouts.app')

@section('page_title', $post->title)

@section('content')
    <div class="content">
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
                <p>{{ count($post->likes) }} Likes |
                    <a href="{{ route('content.post.like', ['id' => $post->id]) }}">Like</a></p>
            </div>
        </div>
    </div>
@endsection