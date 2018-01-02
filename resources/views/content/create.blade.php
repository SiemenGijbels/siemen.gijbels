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

            {!! Form::open(array('route' => array('content.create'), 'files' => true)) !!}


            <div class="form-group">
                {!! Form::label(trans('general.title')) !!}
                {!! Form::text('title', old('title'), ['class'=>'form-control']) !!}
            </div>

            <div class="form-group">
                {!! Form::label(trans('general.content')) !!}
                {!! Form::textarea('content',  old('content'),['class'=>'form-control form-textarea']) !!}
            </div>

            <div class="form-group">
                {!! Form::label(trans('general.updateimage')) !!}
                {!! Form::file('image', ['class'=>'form-control']) !!}
            </div>

            @foreach($tags as $tag)
                <div class="checkbox">
                    <label>
                        <input type="checkbox" name="tags[]" value="{{ $tag->id }}"> {{ $tag->name }}
                    </label>
                </div>
            @endforeach

            <div class=" form-group">
                {!! Form::hidden('user_id', Auth::user()->id, ['class'=>'form-control']) !!}
            </div>

            <div class="form-group">
                <button class="btn btn-success">@lang('general.submit')</button>
            </div>

            {!! Form::close() !!}

            </div>
        </div>
    </div>
@endsection