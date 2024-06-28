<x-admin>
    <x-slot name="header">
        {{ __('Access tokens') }}
    </x-slot>

    @if ($accessTokens->isEmpty())
        <p class="w-full text-center text-gray-900 dark:text-white">{{ __('No access tokens') }}.</p>
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
                        <tr class="border-b bg-gray-100 hover:bg-gray-200 dark:border-gray-700 dark:bg-gray-800 dark:hover:bg-gray-600">
                            <th class="px-4 py-2 font-medium text-gray-900 dark:text-white" scope="row">
                                <a class="block" href="{{ route('access-token.show', $accessToken) }}" title="{{ __('Show') }}">
                                    {{ $accessToken->token }}
                                </a>
                            </th>
                            <td class="flex flex-row flex-wrap items-center gap-2 px-4 py-2">
                                {{ $accessToken->isActive() ? __('Yes') : __('No') }}
                                <x-dynamic-component class="{{ $accessToken->isActive() ? 'text-green-800' : 'text-red-800' }} h-8 w-auto"
                                    component="{{ $accessToken->isActive() ? 'icon-confirm' : 'icon-cancel' }}" />
                            </td>
                            <td class="px-4 py-2">
                                {{ $accessToken->email }}
                            </td>
                            <td class="flex flex-row flex-wrap justify-end gap-4 px-4 py-2">
                                <a class="font-medium text-blue-600 hover:underline dark:text-blue-500" href="{{ route('access-token.edit', $accessToken) }}">
                                    {{ __('Edit') }}
                                </a>
                                <x-delete-button class="font-medium text-rose-600 hover:underline dark:text-rose-500" id="delete-{{ $accessToken->id }}"
                                    type="buttons.link" content="{{ $accessToken->name }}" action="{{ route('access-token.destroy', $accessToken) }}" />
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @endif

</x-admin>


