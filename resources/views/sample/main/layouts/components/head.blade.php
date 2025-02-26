<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />

<link rel="preload" href="/temple/fonts/SFProDisplay/SF-Pro-Display-Regular.otf" as="font" type="font/woff2"
    crossorigin="">

<meta name="og:site_name" content="{{ $settings->name }}">
<title itemprop="headline">{{ $settings->name }}</title>
<meta property="og:title" content="{{ $settings->name }}">
<meta name="twitter:title" content="{{ $settings->name }}">

<meta itemprop="description" name="description" content="{{ $description }}">
<meta name="twitter:description" content="{{ $description }}">
<meta property="og:description" content="{{ $description }}">

<meta name="language" content="{{ Illuminate\Support\Facades\App::currentLocale() }}">
<meta property="og:locale" content="{{ Illuminate\Support\Facades\App::currentLocale() }}">
<meta name="author" content="{{ $settings->name }}, {{ $settings->email }}">
<meta name="og:email" content="{{ $settings->email }}" />

<meta name="keywords" content="">
@if(env('APP_TEST'))
    <meta name="robots" content="noindex, nofollow"/>
@endif
<!--  -->

<link rel="shortcut icon" href="/favicon.ico" type="image/x-icon">
<meta name="og:image" content="/favicon.ico" />

<link rel="icon" href="/temple/images/layout/logo/logo16x16.png" sizes="16x16" type="image/png">
<link rel="icon" href="/temple/images/layout/logo/logo32x32.png" sizes="32x32" type="image/png">
<link rel="icon" href="/temple/images/layout/logo/logo64x64.png" sizes="64x64" type="image/png">
<link rel="icon" href="/temple/images/layout/logo/logo96x96.png" sizes="96x96" type="image/png">
<link rel="icon" href="/temple/images/layout/logo/logo128x128.png" sizes="128x128" type="image/png">
<link rel="icon" href="/temple/images/layout/logo/logo152x152.png" sizes="152x152" type="image/png">
<link rel="icon" href="/temple/images/layout/logo/logo192x192.png" sizes="192x192" type="image/png">

<link rel="apple-touch-icon-precomposed" sizes="16x16" href="/temple/images/layout/logo/logo16x16.png">
<link rel="apple-touch-icon-precomposed" sizes="32x32" href="/temple/images/layout/logo/logo32x32.png">
<link rel="apple-touch-icon-precomposed" sizes="64x64" href="/temple/images/layout/logo/logo64x64.png">
<link rel="apple-touch-icon-precomposed" sizes="128x128" href="/temple/images/layout/logo/logo128x128.png">
<link rel="apple-touch-icon-precomposed" sizes="152x152" href="/temple/images/layout/logo/logo152x152.png">

<link rel="icon" href="/temple/images/layout/logo/favicon32x32.svg" sizes="any" type="image/svg+xml">

<!--  -->

<meta name="og:region" content="ar" />
<meta http-equiv="Cache-Control" content="yes-cache">
<meta property="og:type" content="website">
<meta property="og:url" content="{{ route('home') }}">
{{-- <link rel="alternate" href="{{ route('lang_home', ['lang_slug' => 'ru']) }}" hreflang="ru-ae">
    <link rel="alternate" href="{{ route('lang_home', ['lang_slug' => 'en']) }}" hreflang="en-ae"> --}}

<!--  -->
@vite('resources/js/_jquery.js')
@vite('resources/js/layout/layout.js')
@vite('resources/js/layout/location.js')
