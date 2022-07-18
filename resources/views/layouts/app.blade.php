<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

    <!-- Styles -->
    <link rel="stylesheet" href="/css/app.css">
    <link rel="stylesheet" href="/css/custom.css">

    <!-- Scripts -->
    <script src="/js/app.js" defer></script>

    <!-- Icons -->
    <script src="https://kit.fontawesome.com/a9afc2067f.js" crossorigin="anonymous"></script>

    <!-- jQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
</head>

<body class="font-sans antialiased">
    <div class="min-h-screen bg-white">
        @include('layouts.navigation')

        <main>
            <div class="w-full sm:w-4/5 min-h-screen m-auto bg-gray-100 px-3 sm:px-10 py-5 shadow-lg shadow-slate-500">
                @yield('content')
            </div>
        </main>

        @include('layouts.footer')
    </div>

    @yield('script')
</body>

</html>