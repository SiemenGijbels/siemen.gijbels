@extends('layouts.mail')
@section('content')
You received a message from : {{ $name }}

<p>
    Name: {{ $name }}
</p>

<p>
    Email: {{ $email }}
</p>

<p>
    Message: {{ $user_message }}
</p>

@stop