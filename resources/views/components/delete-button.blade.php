@props(['action', 'type' => 'buttons.delete', 'content', 'id'])

<div x-data="{ 'showModal': false }" @keydown.escape="showModal = false" {{ $attributes->merge(['class']) }}>
    <form id="{{ $id ?? 'delete' }}" action="{{ $action }}" method="POST">
        @method('DELETE') @csrf
    </form>

    <x-dynamic-component type="button" :component="$type" x-on:click="showModal = true">
        {{ __('Delete') }}
    </x-dynamic-component>

    <div class="fixed inset-0 z-50 flex items-start justify-center overflow-y-auto bg-black/50 px-4 py-6 dark:bg-white/25 sm:px-0" style="display: none;"
        x-show="showModal" x-on:close.stop="showModal = false" x-on:keydown.escape.window="showModal = false">

        <div class="mx-auto my-6 max-w-3xl transform overflow-hidden rounded-lg bg-white shadow-xl transition-all dark:bg-gray-900"
            x-on:click.away="showModal = false" x-transition:enter="ease-out duration-300"
            x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95" x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100"
            x-transition:leave="ease-in duration-200" x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100"
            x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95">

            <div class="px-4 py-6 text-center text-2xl font-medium text-gray-900 dark:text-slate-400">
                {{ __('Are you sure you want to delete?') }}
                @if (isset($content) && !empty($content))
                    <p>{{ $content }}</p>
                @endif
            </div>

            <footer class="flex flex-row justify-between gap-x-8 bg-gray-100 px-6 py-4 dark:bg-gray-800">
                <x-button x-on:click="showModal = false">
                    {{ __('Cancel') }}
                </x-button>
                <x-danger-button form="{{ $id ?? 'delete' }}">
                    {{ __('Confirm') }}
                </x-danger-button>
            </footer>

        </div>

    </div>

</div>
