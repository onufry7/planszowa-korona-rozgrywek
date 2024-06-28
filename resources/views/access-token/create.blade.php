<x-app-layout>

    <x-slot name="header"> {{ __('Access tokens') }} </x-slot>

    <header class="page-header">
        <h2> {{ __('Add new access token') }} </h2>
    </header>

    <x-form-classic action="{{ route('access-token.store') }}" method="POST">

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

    </x-form-classic>

</x-app-layout>
