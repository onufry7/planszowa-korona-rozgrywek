<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    {{-- <meta name="csrf-token" content="{{ csrf_token() }}"> --}}

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- Styles -->
    @livewireStyles
</head>

<body class="font-sans antialiased">
    <x-banner />

    <div class="min-h-screen bg-gray-100 dark:bg-gray-900 flex flex-col justify-between">
        <div>
            @livewire('navigation-menu')

            <!-- Page Heading -->
            @if (isset($header))
            <header class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                <h2
                    class="text-center font-semibold text-2xl text-gray-800 dark:text-gray-200 leading-tight border-b-2 border-gray-600">
                    {{ $header }}
                </h2>
            </header>
            @endif

            <!-- Page Content -->
            <main class="text-gray-800 dark:text-gray-200">
                {{ $slot }}
            </main>
        </div>

        <footer class="relative bottom-0 bg-white dark:bg-gray-800 shadow text-center p-2">
            <span class="text-gray-800 dark:text-gray-200 leading-tight">
                Created By Szymon Burnejko &copy; 2024 - {{ date('Y') }}
            </span>
        </footer>

    </div>

    @stack('modals')

    @livewireScripts
</body>

</html>