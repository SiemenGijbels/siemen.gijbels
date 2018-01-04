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
        </div>
        <div class="collapse navbar-collapse" id="app-navbar-collapse">
            <!-- Left Side Of Navbar -->
            <!-- Branding Image -->
            @if(Auth::user())
                <a href="{{ route('content.create') }}" class="btn btn-success createBtn"
                   @if (\Request::is('admin'))style="display: none" @endif><i
                            class="fas fa-plus-circle"></i> @lang('general.newpost')</a>
            @endif

            @if (\Request::is('/'))
                <a class="navbar-brand activeFront" href="{{ url('/') }}">
                    <i class="fas fa-th"></i> Blog
                </a>
                @if(Auth::user())
                    <a class="navbar-brand" href="{{ route('content.archive') }}">
                        <i class="fas fa-archive"></i> @lang('general.archive')
                    </a>
                @endif
                <a class="navbar-brand" href="{{ route('content.about') }}">
                    <i class="fas fa-info-circle"></i> @lang('general.about')
                </a>
            @elseif (\Request::is('archive'))
                <a class="navbar-brand" href="{{ url('/') }}">
                    <i class="fas fa-th"></i> Blog
                </a>
                @if(Auth::user())
                    <a class="navbar-brand activeFront" href="{{ url('archive') }}">
                        <i class="fas fa-archive"></i> @lang('general.archive')
                    </a>
                @endif
                <a class="navbar-brand" href="{{ route('content.about') }}">
                    <i class="fas fa-info-circle"></i> @lang('general.about')
                </a>
            @elseif (\Request::is('about'))
                <a class="navbar-brand" href="{{ url('/') }}">
                    <i class="fas fa-th"></i> Blog
                </a>
                @if(Auth::user())
                    <a class="navbar-brand" href="{{ route('content.archive') }}">
                        <i class="fas fa-archive"></i> @lang('general.archive')
                    </a>
                @endif
                <a class="navbar-brand activeFront" href="{{ route('content.about') }}">
                    <i class="fas fa-info-circle"></i> @lang('general.about')
                </a>
            @else
                <a class="navbar-brand" href="{{ url('/') }}">
                    <i class="fas fa-th"></i> Blog
                </a>
                @if(Auth::user())
                    <a class="navbar-brand" href="{{ route('content.archive') }}">
                        <i class="fas fa-archive"></i> @lang('general.archive')
                    </a>
                @endif
                <a class="navbar-brand" href="{{ route('content.about') }}">
                    <i class="fas fa-info-circle"></i> @lang('general.about')
                </a>
        @endif

            <!-- Right Side Of Navbar -->
            <ul class="nav navbar-nav navbar-right">
                <!-- Authentication Links -->
                @guest
                    <li><a href="{{ route('login') }}">@lang('general.login')</a></li>
                    <li><a href="{{ route('register') }}">@lang('general.register')</a></li>
                @else


                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                           aria-expanded="false" style="position:relative; padding-left:50px;">
                            <img src="{{ asset('uploads/avatars/') }}/{{ Auth::user()->avatar }}"
                                 style="width:32px; height:32px; position:absolute; top:10px; left:10px; border-radius:50%">
                            {{ Auth::user()->name }} <span class="caret"></span>
                        </a>

                        <ul class="dropdown-menu">
                            <li>
                                <a href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                     document.getElementById('logout-form').submit();">
                                    <i class="fas fa-sign-out-alt"></i> @lang('general.logout')
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                      style="display: none;">
                                    {{ csrf_field() }}
                                </form>
                            </li>
                            <!--Language-->
                            @foreach (Config::get('languages') as $lang => $language)
                                @if ($lang != App::getLocale())
                                    <li>
                                        <a href="{{ route('lang.switch', $lang) }}"><i class="fas fa-globe"></i> {{$language}}</a>
                                    </li>
                                @endif
                            @endforeach
                            <li>
                                <a href="{{ route('profile.index') }}"><i class="fas fa-user"></i> @lang('general.profile')</a>
                            </li>
                            @if(Auth::user()->type == 1)
                                <li>
                                    <a href="{{ route('admin.index') }}">
                                        <i class="fas fa-unlock-alt"></i> @lang('general.admin')
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