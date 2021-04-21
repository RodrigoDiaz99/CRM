<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap"
        rel="stylesheet" />
    <!-- Styles -->
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/tailwind.css') }}" />
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
    <!--<script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.js" defer></script>-->
    <link rel="stylesheet" type="text/css"
        href="https://cdn.jsdelivr.net/npm/botman-web-widget@0/build/assets/css/chat.min.css">
    <script src="{{ asset('js/init-alpine.js') }}" defer></script>
    {{-- <script>
            var botmanWidget = {
                aboutText: 'Write Something',
                introMessage: "✋ Hi! I'm form Real Programmer"
            };
        </script> --}}
    <script src='https://cdn.jsdelivr.net/npm/botman-web-widget@0/build/js/widget.js'></script>
    <!-- Scripts -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.css" />
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"
        integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    <script src="https://use.fontawesome.com/releases/v5.15.1/js/all.js" data-mutate-approach="sync"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.js" defer></script>
    <script src="{{ asset('js/charts-lines.js') }}" defer></script>
    <script src="{{ asset('js/charts-pie.js') }}" defer></script>
    <script src="{{ asset('js/charts-bars.js') }}" defer></script>
    <script src="{{ mix('js/app.js') }}" defer></script>
    @livewireStyles
    <script>
        import Turbolinks from 'turbolinks';
        Turbolinks.start()

    </script>
</head>

<body class="font-sans antialiased">

    <div x-data="{ cartOpen: false , isOpen: false }" class="bg-white">
        <header>
            @include('layouts.nav-store')
        </header>
        
        <main class="my-8">
           {{$slot}}
        </main>

        <footer class="bg-gray-200">
           @include('layouts.footer')
        </footer>
    </div>
</body>

</html>
