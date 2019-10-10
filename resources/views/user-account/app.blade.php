<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Baldininkams') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <!-- Styles -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.4.1/semantic.min.css">
    <link href="{{ asset('css/main.css') }}" rel="stylesheet">

</head>
<body>
<div class="top-nav-bar"
{{--@guest--}}
     {{--logIn="{{['route'=>route('login'), 'name'=>__('login')]}}"--}}
    {{--@if (Route::has('register'))--}}
     {{--register="{{['route'=>route('register'), 'name'=>__('Register')]}}"--}}
    {{--@endif--}}
{{--@else--}}


            {{--<a class="dropdown-item" href="{{ route('logout') }}"--}}
               {{--onclick="event.preventDefault();--}}
                                                     {{--document.getElementById('logout-form').submit();">--}}
                {{--{{ __('Logout') }}--}}
            {{--</a>--}}

            {{--<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">--}}
                {{--@csrf--}}
            {{--</form>--}}
{{--@endguest--}}

>

</div>
    <div id="app">
        <nav class="ui large top fixed secondary pointing menu">
            <div class="ui  container">
                <a class="item" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                {{--<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">--}}
                    {{--<span class="navbar-toggler-icon"></span>--}}
                {{--</button>--}}

                    <!-- Left Side Of Navbar -->
                    <ul class="left menu">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="left menu">
                        <!-- Authentication Links -->
                        @guest
                            <li class="item">
                                <a class="link item" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="item">
                                    <a class="link item" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="ui dropdown item">
                                <a id="navbarDropdown" class="link item dropdown" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>
</html>
