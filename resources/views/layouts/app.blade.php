<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="{{ asset('css/app.css') }}" />
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Scripts -->
        <link rel="stylesheet" href="{{ asset('js/app.js') }}" />

        <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
        <style>
            [x-cloak] {
           display: none !important;
        }
         </style>

        @livewireStyles

    </head>
    <body class="font-sans antialiased bg-gray-50">

        <nav class="flex container mx-auto justify-end py-2 border bg-gray-500">
            <a href="#">
                <li class="list-none px-2 py-1 border bg-gray-500 text-white rounded">HOME</li>
            </a>

            <a href="{{ route('items.index') }}">
                <li class="list-none px-2 py-1 border bg-gray-500 text-white rounded">ITEMS</li>
            </a>

            <a href="#">
                <li class="list-none px-2 py-1 border bg-gray-500 text-white rounded">CONSUMPTIONS</li>
            </a>

        </nav>

       <section class="container mx-auto mt-1">

           @yield('content')
       </section>

        @livewireScripts
    </body>
</html>
