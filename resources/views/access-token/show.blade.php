<x-app-layout>

    <x-slot name="header">
        {{ __('Access tokens') }}
    </x-slot>

    <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
        <div class="px-4 py-5 sm:p-6 bg-white dark:bg-gray-800 shadow sm:rounded-lg">

            <div class="flex flex-col flex-wrap gap-y-2 p-4 sm:justify-between">
                <p class="flex flex-row flex-wrap items-center gap-2">
                    {{ __('Token') }}: {{ $accessToken->token }}
                </p>

                <p class="flex flex-row flex-wrap items-center gap-2">
                    {{ __('Active') }}:
                    {{ $accessToken->isActive() ? __('Yes') : __('No') }}
                </p>

                <p class="flex flex-row flex-wrap items-center gap-2">
                    {{ __('URL') }}: {{ $accessToken->url }}
                </p>

                <p class="flex flex-row flex-wrap items-center gap-2">
                    {{ __('Email') }}: {{ $accessToken->email }}
                </p>

                <p class="flex flex-row flex-wrap items-center gap-2">
                    {{ __('Expired') }}:
                    {{ $accessToken->isExpired() ? __('Yes') : __('No') }}
                </p>

                <p class="flex flex-row flex-wrap items-center gap-2">
                    {{ __('Expires at') }}: {{ $accessToken->expires_at }}
                </p>

                <p class="flex flex-row flex-wrap items-center gap-2">
                    {{ __('Used') }}:
                    {{ $accessToken->is_used ? __('Yes') : __('No') }}
                </p>

                <p class="mt-8 flex flex-col justify-between gap-2 md:flex-row">
                    <span>{{ __('Created') }}: {{ $accessToken->created_at }}</span>
                    <span>{{ __('Updated') }}: {{ $accessToken->updated_at }}</span>
                </p>
            </div>

            <div class="flex flex-row flex-wrap justify-between gap-10 border-t-2 px-4 py-2 my-2">
                <div class="flex flex-row flex-wrap justify-center gap-10">
                    <a href="{{ url()->previous() }}">
                        {{ __('Return') }}
                    </a>
                </div>

                <div class="flex flex-row flex-wrap justify-center gap-10">
                    <a href="{{ route('access-token.edit', $accessToken) }}">
                        {{ __('Edit') }}
                    </a>
                    <x-delete-button action="{{ route('access-token.destroy', $accessToken) }}" />
                </div>
            </div>

            </x-admin>