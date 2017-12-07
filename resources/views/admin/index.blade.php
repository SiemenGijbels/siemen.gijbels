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
                    <th>@lang('general.title')</th>
                    <th>@lang('general.detail')</th>
                    <th>@lang('general.edit')</th>
                    <th>@lang('general.delete')</th>
                </tr>
                @foreach($posts as $post)
                    <tr>
                        <td>{{ $post->title }}</td>
                        <td><a href="{{ route('content.post', ['id' => $post->id]) }}">@lang('general.moredetails')</a></td>
                        <td><a href="{{ route('admin.edit', ['id' => $post->id]) }}">@lang('general.edit')</a></td>
                        <td><a href="{{ route('admin.delete', ['id' => $post->id]) }}">@lang('general.delete')</a></td>
                    </tr>
                @endforeach
            </table>
        </div>
    </div>
    </div>

@endsection