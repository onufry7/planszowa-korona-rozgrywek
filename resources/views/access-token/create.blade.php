<x-app-layout>

    <x-slot name="header"> {{ __('Access tokens') }} </x-slot>

    <header class="page-header">
        <h2> <x-icon-plus class="h-8" /> {{ __('Add new access token') }} </h2>
    </header>

    <x-forms.classic action="{{ route('access-token.store') }}" method="POST">

        <x-slot name="form">
            @include('access-token.form-fields')
        </x-slot>

        {{-- Actions --}}
        <x-slot name="actions">
            <x-buttons.a-backward href="{{ url()->previous() }}">
                {{ __('Return') }}
            </x-buttons.a-backward>

            <x-buttons.save type="submit">
                {{ __('Save') }}
            </x-buttons.save>
        </x-slot>

    </x-forms.classic>

</x-app-layout>
