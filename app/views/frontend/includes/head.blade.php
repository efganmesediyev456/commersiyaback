<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="robots" content="index, follow">
    <meta name="keywords"             content="@yield('keywords')">
    <meta name="description"          content="@yield('description')">
    <meta property="og:url"           content="{{ request()->fullUrl() }}" />
    <meta property="og:type"          content="website" />
    <meta property="og:title"         content="@yield('title')" />
    <meta property="og:description"   content="@yield('description')" />
    <meta property="og:image"         content="@yield('image')" />
    <meta name="author" content="@yield('title') @hasSection('title') | @endif {{setting('app_name_'. config('app.locale') ,
         '"Bakı Metropoliteni" Qapalı Səhmdar Cəmiyyəti')}}">
    <meta name="apple-mobile-web-app-status-bar-style" content="#4C923A">
    <meta name="msapplication-navbutton-color" content="#4C923A">
    <meta name="theme-color"          content="#4C923A">
    <link rel="icon" type="image/svg+xml" href="{{asset('assets/images/logo-single.svg')}}">
    <link rel="alternate icon" href="{{asset('assets/images/logo-single.svg')}}">
    <link rel="mask-icon" href="{{asset('assets/images/logo-single.svg')}}">
    <title>@yield('title') @hasSection('title') | @endif {{setting('app_name_'. config('app.locale') ,
         '"Bakı Metropoliteni"Qapalı Səhmdar Cəmiyyəti')}}
    </title>
    <link rel="stylesheet" href="{{asset('frontend/css/font/stylesheet.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/css/style.css')}}">
    <script src="{{asset('frontend/js/svg-symbols.js')}}"></script>
    @stack('css')

    {!! htmlScriptTagJsApi() !!}
</head>




