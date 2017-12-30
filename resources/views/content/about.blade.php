@extends('layouts.app')

@section('page_title', 'About')

@section('content')
    <div class="content">
        <div class="row">
            <div class="col-md-12">
                <p class="quote">About Me</p>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <p>Send me an <a href="mailto:gijbelssiemen@gmail.com">email</a>&comma; follow me on <a href="https://instagram.com/siemengijbels" target="_blank">Instagram</a>&comma; check my <a href="https://www.linkedin.com/in/siemen-gijbels-16300a130/" target="_blank">LinkedIn</a> or simply try to contact me on <a href="https://www.facebook.com/SiemenGijbels" target="_blank">Facebook</a> &lpar;can&apos;t guarantee that it will come through though&rpar;&period;</p>
            </div>
        </div>
    </div>
    @include('partials.contact')
@endsection