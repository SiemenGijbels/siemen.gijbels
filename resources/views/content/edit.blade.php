@extends('layouts.app')

@section('page_title', trans('general.edit'))

@section('content')
    <div class="content">
        <div class="row">
            <div class="col-md-12">

                @if(Auth::user())
                    <div class="col-md-6">
                        <img class="editImage" src="{{ asset('uploads/images/') }}/{{ $post->image  }}">
                    </div>
                    <div class="col-md-6">
                        {!! Form::open(array('route' => array('content.update'), 'files' => true)) !!}


                        <div class="form-group">
                            {!! Form::label(trans('general.title')) !!}
                            {!! Form::text('title', $post->title, ['class'=>'form-control']) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::label(trans('general.content')) !!}
                            {!! Form::textarea('content', $post->content, ['class'=>'form-control form-textarea']) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::label(trans('general.updateimage')) !!}
                            {!! Form::file('image', ['class'=>'form-control']) !!}
                        </div>

                        @foreach($tags as $tag)
                                <label>
                                    <input type="checkbox" name="tags[]"
                                           value="{{ $tag->id }}" {{ $post->tags->contains($tag->id) ? 'checked' : '' }}> {{ $tag->name }}
                                </label>
                        @endforeach

                        <div class=" form-group">
                            {!! Form::hidden('post_id', $post->id, ['class'=>'form-control']) !!}
                        </div>

                        <div class="form-group">
                            <button class="btn btn-success">@lang('general.submit')</button>
                        </div>

                        {!! Form::close() !!}

                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection