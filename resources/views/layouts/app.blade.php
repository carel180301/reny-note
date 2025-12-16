<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Askrindo') }}</title>

        <link rel="icon" type="image/png" href="{{ asset('assets/logo-askrindo-minimal.png') }}">

        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        @vite(['resources/css/app.css', 'resources/js/app.js'])

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    </head>

    <body class="font-sans antialiased flex flex-col min-h-screen">
        <div class="flex flex-col flex-grow bg-white-100">
            @include('layouts.navigation')

            <!-- Page Content -->
            <main class="flex-grow pb-16">
                {{ $slot }}
            </main>
        </div>

        <!-- Footer -->
        <footer class="bg-white fixed bottom-0 left-0 w-full z-40">
            <div class="w-full py-3 px-4 sm:px-6 lg:px-8 text-center text-sm text-gray-600">
                &copy; 2025 PT. Asuransi Kredit Indonesia
            </div>
        </footer>
    </body>
</html>
