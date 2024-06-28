<x-app-layout>
    <x-slot name="header">
        {{ __('Admin Dashboard') }}
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="p-6 lg:p-8 bg-white dark:bg-gray-800 dark:bg-gradient-to-bl dark:from-gray-700/50 dark:via-transparent overflow-hidden shadow-xl sm:rounded-lg">

                <nav class="flex w-full flex-wrap flex-row justify-start gap-8 border-b border-gray-200 dark:border-gray-700 mb-8">
                    <x-nav-link href="{{ route('admin.dashboard') }}" :active="request()->routeIs('admin.dashboard')">
                        {{ __('Admin Dashboard') }}
                    </x-nav-link>

                    <x-nav-link href="{{ route('admin.access-token.index') }}" :active="request()->routeIs('admin.access-token.*')">
                        {{ __('Access Token') }}
                    </x-nav-link>
                </nav>

                {{ $slot }}

            </div>
        </div>
    </div>
</x-app-layout>
