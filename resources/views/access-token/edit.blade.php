<x-app-layout>

    <x-slot name="header">
        {{ __('Access tokens') }}
    </x-slot>

    <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
        <div class="px-4 py-5 sm:p-6 bg-white dark:bg-gray-800 shadow sm:rounded-lg">

            <header class="page-header">
                <h3> {{ __('Edit :resource', ['resource' => $accessToken->token]) }} </h3>
            </header>

            <x-form-classic action="{{ route('access-token.update', $accessToken) }}" method="PUT">

                <x-slot name="form">
                    @include('access-token.form-fields')
                </x-slot>

                <x-slot name="actions">
                    <a href="{{ url()->previous() }}">
                        {{ __('Return') }}
                    </a>

                    <x-button type="submit">
                        {{ __('Update') }}
                    </x-button>
                </x-slot>

            </x-form-classic>

        </div>
    </div>
</x-app-layout>