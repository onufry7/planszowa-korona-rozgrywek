<x-app-layout>

    <x-slot name="header"> {{ __('Access tokens') }} </x-slot>

    <header class="page-header">
        <h2> <x-icon-pencil class="h-8" /> {{ __('Edit :resource', ['resource' => $accessToken->token]) }} </h2>
    </header>

    <x-forms.classic action="{{ route('access-token.update', $accessToken) }}" method="PUT">

        <x-slot name="form">
            @include('access-token.form-fields')
        </x-slot>

        <x-slot name="actions">
            <x-buttons.a-backward href="{{ url()->previous() }}">
                {{ __('Return') }}
            </x-buttons.a-backward>

            <x-buttons.save type="submit">
                {{ __('Update') }}
            </x-buttons.save>
        </x-slot>

    </x-forms.classic>

</x-app-layout>
