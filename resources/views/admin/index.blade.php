@extends('layouts.app')

@section('page_title', trans('general.adminindex'))

@section('content')
    <div class="content">
        @if(Session::has('info'))
            <div class="row">
                <div class="col-md-12">
                    <p class="alert alert-info">{{ Session::get('info') }}</p>
                </div>
            </div>
        @endif
        <div class="row">
            <div class="col-md-12">
                <a href="{{ route('admin.create') }}" class="btn btn-success">@lang('general.newpost')</a>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 text-center">
                <table>
                    <tr>
                        <th>@lang('general.users')</th>
                        <th>@lang('general.posts')</th>
                        <th>@lang('general.archived')</th>
                        <th>@lang('general.softdeleted')</th>
                        <th>@lang('general.comments')</th>
                        <th>Likes</th>
                    </tr>
                    <tr>
                        <td>{{ $users->count() }}</td>
                        <td>{{ $posts->count() }}</td>
                        <td>{{ $archivedPosts->count() }}</td>
                        <td>{{ $softDeletedPosts->count() }}</td>
                        <td>{{ $comments->count() }}</td>
                        <td>{{ $likes->count() }}</td>
                    </tr>
                </table>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 text-center">
                <table>
                    <tr>
                        <th>ID</th>
                        <th>@lang('general.user')</th>
                        <th>@lang('general.title')</th>
                        <th>@lang('general.detail')</th>
                        <th>Likes</th>
                        <th>@lang('general.comments')</th>
                        <th>@lang('general.archived')</th>
                        <th>@lang('general.softdeleted')</th>
                        <th>@lang('general.edit')</th>
                        <th>@lang('general.delete')</th>
                    </tr>
                    @foreach($posts as $post)
                        <tr>
                            <td>{{ $post->id }}</td>
                            <td>{{ empty($post->user) ? trans('general.nouser') : $post->user->name }}</td>
                            <td>{{ $post->title }}</td>
                            <td>
                                <a href="{{ route('content.post', ['id' => $post->id]) }}">@lang('general.moredetails')</a>
                            </td>
                            <td>{{ $post->likes->count() }}</td>
                            <td>{{ $post->comments->count() }}</td>
                            @if($post->archived == 1)
                                <td>@lang('general.yes')</td>
                            @else
                                <td>@lang('general.no')</td>
                            @endif
                            @if($post->archived == 2)
                                <td>@lang('general.yes') | <a href="{{ route('admin.post.putback', ['id' => $post->id]) }}">@lang('general.unarchive')</a></td>
                            @else
                                <td>@lang('general.no')</td>
                            @endif
                            <td><a href="{{ route('admin.edit', ['id' => $post->id]) }}">@lang('general.edit')</a></td>
                            <td><a href="{{ route('admin.delete', ['id' => $post->id]) }}">@lang('general.delete')</a>
                            </td>
                        </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </div>

@endsection