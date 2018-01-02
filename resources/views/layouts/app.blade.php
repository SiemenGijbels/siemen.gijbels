<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('page_title')</title>

    <!-- Styles -->
    <link href="{{ URL::asset('assets/css/app.css') }}" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    {{--<script type="text/javascript" src="//platform.linkedin.com/in.js">--}}
        {{--api_key:   86r5ifzyjdxn8y--}}
        {{--authorize: true--}}
    {{--</script>--}}
</head>
<body>
@yield('social_share')
<div id="app">
    <nav class="navbar navbar-default navbar-static-top">
        <div class="container">
            <div class="navbar-header">

                <!-- Collapsed Hamburger -->
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                        data-target="#app-navbar-collapse" aria-expanded="false">
                    <span class="sr-only">Toggle Navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>

                <!-- Branding Image -->
                @if(Auth::user())
                    <a href="{{ route('content.create') }}" class="btn btn-success" @if (\Request::is('admin'))style="display: none" @endif>@lang('general.newpost')</a>
                @endif

                @if (\Request::is('/'))
                    <a class="navbar-brand activeFront" href="{{ url('/') }}">
                        Blog
                    </a>
                    @if(Auth::user())
                        <a class="navbar-brand" href="{{ route('content.archive') }}">
                            @lang('general.archive')
                        </a>
                    @endif
                    <a class="navbar-brand" href="{{ url('about') }}">
                        @lang('general.about')
                    </a>
                @elseif (\Request::is('archive'))
                    <a class="navbar-brand" href="{{ url('/') }}">
                        Blog
                    </a>
                    @if(Auth::user())
                        <a class="navbar-brand activeFront" href="{{ url('archive') }}">
                            @lang('general.archive')
                        </a>
                    @endif
                    <a class="navbar-brand" href="{{ url('about') }}">
                        @lang('general.about')
                    </a>
                @elseif (\Request::is('about'))
                    <a class="navbar-brand" href="{{ url('/') }}">
                        Blog
                    </a>
                    @if(Auth::user())
                        <a class="navbar-brand" href="{{ route('content.archive') }}">
                            @lang('general.archive')
                        </a>
                    @endif
                    <a class="navbar-brand activeFront" href="{{ url('about') }}">
                        @lang('general.about')
                    </a>
                @else
                    <a class="navbar-brand" href="{{ url('/') }}">
                        Blog
                    </a>
                    @if(Auth::user())
                        <a class="navbar-brand" href="{{ route('content.archive') }}">
                            @lang('general.archive')
                        </a>
                    @endif
                    <a class="navbar-brand" href="{{ url('about') }}">
                        @lang('general.about')
                    </a>
                @endif
            </div>
            <div class="collapse navbar-collapse" id="app-navbar-collapse">
                <!-- Left Side Of Navbar -->
                <ul class="nav navbar-nav">
                    &nbsp;
                </ul>

                <!-- Right Side Of Navbar -->
                <ul class="nav navbar-nav navbar-right">
                    <!--Language-->
                    <ul>
                        <li>
                            <a href="#" class="currentLang">
                                {{ Config::get('languages')[App::getLocale()] }}
                            </a>
                        </li>
                        @foreach (Config::get('languages') as $lang => $language)
                            @if ($lang != App::getLocale())
                                <li>
                                    <a href="{{ route('lang.switch', $lang) }}">{{$language}}</a>
                                </li>
                            @endif
                        @endforeach
                    </ul>
                    <!-- Authentication Links -->
                    @guest
                        <li><a href="{{ route('login') }}">@lang('general.login')</a></li>
                        <li><a href="{{ route('register') }}">@lang('general.register')</a></li>
                    @else


                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" style="position:relative; padding-left:50px;">
                                <img src="{{ asset('uploads/avatars/') }}/{{ Auth::user()->avatar }}" style="width:32px; height:32px; position:absolute; top:10px; left:10px; border-radius:50%">
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>

                            <ul class="dropdown-menu">
                                <li>
                                    <a href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                     document.getElementById('logout-form').submit();">
                                        @lang('general.logout')
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                          style="display: none;">
                                        {{ csrf_field() }}
                                    </form>
                                </li>
                                <li>
                                    <a href="{{ route('profile.index') }}">@lang('general.profile')</a>
                                </li>
                                @if(Auth::user()->type == 1)
                                    <li>
                                        <a href="{{ route('admin.index') }}">
                                            @lang('general.admin')
                                        </a>
                                    </li>
                                @endif
                            </ul>
                        </li>
                    @endguest
                </ul>
            </div>
        </div>
    </nav>

    @yield('content')
</div>
@yield('scripts')
<!-- Scripts -->
<script src="{{ asset('js/app.js') }}"></script>
<script src="{{ asset('js/masonry.pkgd.min.js') }}" type="text/javascript"></script>
<script>
    $('.blogPics').on('load', function () {
        $('.grid').masonry({
            itemSelector: '.grid-item'
        });
        $('.loading').fadeOut();
    });
</script>
</body>
</html>
