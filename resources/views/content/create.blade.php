@extends('layouts.app')

@section('page_title', trans('general.admincreate'))

@section('content')
    <div class="content">
        @if(count($errors->all()))
            <div class="row">
                <div class="col-md-12">
                    <div class="alert alert-danger">
                        <ul>
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>

        @endif

        <div class="row">
                <form enctype="multipart/form-data" action="{{ route('content.create') }}" method="post">
                    <div class="form-group">
                        <label for="title">@lang('general.title')</label>
                        <input type="text" class="form-control" id="title" name="title">
                    </div>
                    <div class="form-group">
                        <label for="content">@lang('general.content')</label>
                        <input type="text" class="form-control" id="content" name="content">
                    </div>
                    <div class="form-group">
                        <input type="hidden" class="form-control" id="user_id" name="user_id" value="{{ Auth::user()->id }}">
                    </div>
                    <div class="form-group">
                        <label>Image</label>
                        <input type="file" name="image">
                    </div>
                    @foreach($tags as $tag)
                        <div class="checkbox">
                            <label>
                                <input type="checkbox" name="tags[]" value="{{ $tag->id }}"> {{ $tag->name }}
                            </label>
                        </div>
                    @endforeach
                    {{ csrf_field() }}
                    <button type="submit" class="btn btn-primary">@lang('general.submit')</button>
                </form>
            </div>
        </div>
    </div>
@endsection