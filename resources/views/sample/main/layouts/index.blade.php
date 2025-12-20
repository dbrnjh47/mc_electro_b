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

        <section id="feedback_modal"></section>

        @guest
            @include('sample.main.pages.auth.modals.login')
            @include('sample.main.pages.auth.modals.signup')
            <script>
                window.routes["profile"] = "{{ route('profile') }}";
                window.routes["registration"] = "{{ route('registration') }}";
                window.routes["auth"] = "{{ route('auth') }}";

            </script>
            @vite('resources/js/auth/login.js')
            @vite('resources/js/auth/signup.js')
        @endguest

        <script>
            window.routes["city.set"] = "{{ route('city.set') }}";
            window.routes["cities"] = "{{ route('cities') }}";
            window.routes["search"] = "{{ route('search') }}";
        </script>

        {{-- <script>
            window.routes["currency.set"] = "{{ route('currency.set') }}";
        </script> --}}

        <main class="main">
            @yield('content')
        </main>

        @yield('footer')
    </div>
</body>

</html>
