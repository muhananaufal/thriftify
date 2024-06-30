<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">
        <link rel="stylesheet" href="{{ asset('css/style.css') }}">
        <link rel="shortcut icon" href="{{ asset('img/logo.png') }}" type="image/x-icon">
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.14.1/dist/cdn.min.js"></script>
    <title>@yield('title')</title>
    @vite('resources/css/app.css')
</head>

<body>
    <div class="md:flex font-poppins">
        @include('partials.user_sidebar')


        <!-- content -->
        <div class="flex-1 flex-col flex min-h-screen">
            @auth
            @include('partials.user_topnav')
            @endauth
            
            @guest
            
            @include('partials.guest_topnav')
            @endguest
            @yield('content')

            @include('partials.footer')

        </div>

    </div>

    <script src="/js/script.js"></script>
</body>

</html>
</div>
