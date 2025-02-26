@php
    $is_404 = isset($exception) ? $exception->getStatusCode() : null;
@endphp

<!DOCTYPE html>
<html lang="{{ Illuminate\Support\Facades\App::currentLocale() }}">

<head>
    @include('sample.main.layouts.components.head')
    @yield('head')
</head>

<body>
    <div class="main_wrapper">
        @yield('header')

        <main class="main">
            @yield('content')
        </main>

        @yield('footer')
    </div>
</body>

</html>
