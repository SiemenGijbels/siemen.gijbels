<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <title>@yield('page_title')</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    @yield('open_graph')

<!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Styles -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <link href="{{ URL::asset('css/app.css') }}" rel="stylesheet">
    <script src="https://use.fontawesome.com/releases/v5.0.2/js/all.js"></script>
    <script src="{{ asset('js/bootstrap-hover-dropdown.js') }}" type="text/javascript"></script>
    @yield('head_scripts')
</head>
<body>
<div id="app">
    @yield('social_share')

    @include('partials.nav')

    @yield('content')
</div>
<!-- Scripts -->
<script src="{{ asset('js/app.js') }}"></script>
<script>
    $.fn.imagesLoaded = function(callback, fireOne) {
        var
            args = arguments,
            elems = this.filter('img'),
            elemsLen = elems.length - 1;

        elems
            .bind('load', function(e) {
                if (fireOne) {
                    !elemsLen-- && callback.call(elems, e);
                } else {
                    callback.call(this, e);
                }
            }).each(function() {
            // cached images don't fire load sometimes, so we reset src.
            if (this.complete || this.complete === undefined){
                this.src = this.src;
            }
        });
    }
</script>
<script>
    $(document).ready(function () {
        $('.dropdown-toggle').dropdownHover(options);
    });
</script>
@yield('scripts')
</body>
</html>
