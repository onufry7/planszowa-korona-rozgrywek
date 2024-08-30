<x-app-layout>
    <x-slot name="header">
        {{ __('Admin') }} - {{ $header }}
    </x-slot>

    <nav class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="flex flex-row flex-wrap gap-4 justify-center">
            <x-nav-link href="{{ route('admin-dashboard') }}" :active="request()->routeIs('admin-dashboard')">
                {{ __('Dashboard') }}
            </x-nav-link>
            <x-nav-link href="{{ route('access-token.index') }}" :active="request()->routeIs('access-token.*')">
                {{ __('Access tokens') }}
            </x-nav-link>
            <x-nav-link href="#" :active="request()->routeIs('season.*')">
                {{ __('Seasons') }}
            </x-nav-link>
            <x-nav-link href="#" :active="request()->routeIs('gamer.*')">
                {{ __('Gamers') }}
            </x-nav-link>
            <x-nav-link href="#" :active="request()->routeIs('game.*')">
                {{ __('Games') }}
            </x-nav-link>
        </div>
    </nav>

    <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
        {{ $slot }}
    </div>

</x-app-layout>