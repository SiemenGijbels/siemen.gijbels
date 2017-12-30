{{--https://www.cloudways.com/blog/laravel-contact-form/--}}
<div class="container">
    @if(Session::has('success'))
        <div class="alert alert-success">
            {{ Session::get('success') }}
        </div>
    @endif

    {!! Form::open(['route'=>'content.about.store']) !!}

    <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
        {!! Form::label(trans('auth.name')) !!}
        {!! Form::text('name', old('name'), ['class'=>'form-control']) !!}
        <span class="text-danger">{{ $errors->first('name') }}</span>
    </div>

    <div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">
        {!! Form::label(trans('auth.email')) !!}
        {!! Form::text('email', old('email'), ['class'=>'form-control']) !!}
        <span class="text-danger">{{ $errors->first('email') }}</span>
    </div>

    <div class="form-group {{ $errors->has('message') ? 'has-error' : '' }}">
        {!! Form::label(trans('auth.message')) !!}
        {!! Form::textarea('message', old('message'), ['class'=>'form-control']) !!}
        <span class="text-danger">{{ $errors->first('message') }}</span>
    </div>

    <div class="form-group">
        <button class="btn btn-success">@lang('general.submit')</button>
    </div>

    {!! Form::close() !!}

</div>