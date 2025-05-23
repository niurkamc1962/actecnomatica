<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Tecnomatica PKI') }}</title>

        <!-- Fonts -->
        <!--<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">-->

        @livewireStyles
        @stack('css')

        <!-- ESTILOS Y CSS DE LA PLANTILLA -->
        <link rel="stylesheet" href="{{ mix('css/app.css') }}">

        <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
        <!-- style css -->
        <link rel="stylesheet" href="{{asset('css/style.css')}}">
        <!-- Responsive-->
        <link rel="stylesheet" href="{{ asset('css/responsive.css') }}">
        <!-- fevicon -->
        <link rel="icon" href="images/fevicon.png" type="image/gif" />
        <!-- Scrollbar Custom CSS -->
        <link rel="stylesheet" href="{{ asset('css/jquery.mCustomScrollbar.min.css') }}">

        <link rel="stylesheet" href="{{ asset('css/font-awesome/font-awesome.css') }}">

    </head>
    <body class="font-sans antialiased">
        <x-jet-banner />

        <div class="min-h-screen bg-gray-100">
            <!-- Banner Tecnomatica -->
            <x-banner-t-m />

            <!-- menu navegacion -->
            @livewire('navigation-menu')

            <!-- Page Content -->
            <main>
                {{ $slot }}
            </main>

            <!-- Aqui va el pie de la pagina con los datos de la empresa -->
            <x-footer-t-m />
        </div>

        @stack('modals')

        @livewireScripts
        @stack('js')

        <!-- Scripts -->
        <script src="{{ mix('js/app.js') }}" defer></script>

    </body>
</html>
