<x-app-layout>
    <x-slot name="header">
        {{ __('Access tokens') }}
    </x-slot>


    <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
        <div class="px-4 py-5 sm:p-6 bg-white dark:bg-gray-800 shadow sm:rounded-lg">


            <x-link-button href="{{ route('access-token.create') }}">
                {{ __('Add') }}
            </x-link-button>


            @if ($accessTokens->isEmpty())
            <p class="w-full text-center">{{ __('No access tokens') }}.</p>
            @else
            <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                <table class="w-full text-left text-sm text-gray-500 rtl:text-right dark:text-gray-400">
                    <thead class="bg-gray-300 text-xs uppercase text-gray-700 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th class="px-4 py-3" scope="col">
                                {{ __('Token') }}
                            </th>
                            <th class="px-4 py-3" scope="col">
                                {{ __('Active') }}
                            </th>
                            <th class="px-4 py-3" scope="col">
                                {{ __('Email') }}
                            </th>
                            <th class="px-4 py-3" scope="col">
                                <span class="sr-only">{{ __('Actions') }}</span>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($accessTokens as $key => $accessToken)
                        <tr
                            class="border-b bg-gray-100 hover:bg-gray-200 dark:border-gray-700 dark:bg-gray-800 dark:hover:bg-gray-600">
                            <th class="px-4 py-2 font-medium text-gray-900 dark:text-white" scope="row">
                                <a class="block" href="{{ route('access-token.show', $accessToken) }}"
                                    title="{{ __('Show') }}">
                                    {{ $accessToken->token }}
                                </a>
                            </th>
                            <td class="flex flex-row flex-wrap items-center gap-2 px-4 py-2">
                                {{ $accessToken->isActive() ? __('Yes') : __('No') }}
                            </td>
                            <td class="px-4 py-2">
                                {{ $accessToken->email }}
                            </td>
                            <td class="flex flex-row flex-wrap justify-end gap-4 px-4 py-2">
                                <a class="font-medium text-blue-600 hover:underline dark:text-blue-500"
                                    href="{{ route('access-token.edit', $accessToken) }}">
                                    {{ __('Edit') }}
                                </a>
                                <x-delete-button class="font-medium text-rose-600 hover:underline dark:text-rose-500"
                                    id="delete-{{ $accessToken->id }}" content="{{ $accessToken->name }}"
                                    action="{{ route('access-token.destroy', $accessToken) }}" />
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            @endif
        </div>
    </div>

</x-app-layout>