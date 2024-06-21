<x-app-layout>

    <x-slot name="header">
        {{ __('Access tokens') }}
    </x-slot>

    <header class="page-header">
        <h2> <x-icon-finger-print class="h-8" /> {{ $accessToken->token }} </h2>
    </header>

    <div class="flex flex-col flex-wrap gap-y-2 p-4 sm:justify-between">
        <p class="flex flex-row flex-wrap items-center gap-2">
            {{ __('Token') }}: {{ $accessToken->token }}
        </p>

        <p class="flex flex-row flex-wrap items-center gap-2">
            {{ __('Active') }}:
            {{ $accessToken->isActive() ? __('Yes') : __('No') }}
            <x-dynamic-component class="{{ $accessToken->isActive() ? 'text-green-800' : 'text-red-800' }} h-6 w-auto"
                component="{{ $accessToken->isActive() ? 'icon-confirm' : 'icon-cancel' }}" />
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
            <x-dynamic-component class="{{ $accessToken->isExpired() ? 'text-green-800' : 'text-red-800' }} h-6 w-auto"
                component="{{ $accessToken->isExpired() ? 'icon-confirm' : 'icon-cancel' }}" />
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

    <div class="action-section">
        <div class="flex flex-wrap justify-center">
            <x-buttons.a-backward href="{{ url()->previous() }}">
                {{ __('Return') }}
            </x-buttons.a-backward>
        </div>

        <div class="flex flex-wrap justify-center gap-10">
            <x-buttons.a-edit href="{{ route('access-token.edit', $accessToken) }}">
                {{ __('Edit') }}
            </x-buttons.a-edit>
            <x-forms.delete action="{{ route('access-token.destroy', $accessToken) }}" />
        </div>
    </div>

</x-app-layout>
