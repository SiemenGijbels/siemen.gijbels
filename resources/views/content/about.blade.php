@extends('layouts.app')

@section('page_title', 'About')

@section('content')
    <div class="content">
        <div class="container">
            <h1>About</h1>
            <p>@lang('general.about1')</p>
            <p>@lang('general.about2')</p>
            <p>@lang('general.about3')</p>
            <ul>
                <li><a href="https://laravel.com/">Laravel</a></li>
                <li><a href="https://masonry.desandro.com/">Masonry (@lang('general.masonry'))</a></li>
                <li><a href="https://getbootstrap.com/">Bootstrap</a></li>
                <li><a href="http://lokeshdhakar.com/projects/color-thief/">Color Thief (@lang('general.colorthief'))</a></li>
            </ul>
        </div>
        @include('partials.contact')
    </div>
@stop