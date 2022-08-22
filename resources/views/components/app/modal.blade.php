@props([
    'showIf' => '',
    'actions' => '',
    'width' => 'sm:w-[800px]',
    'title' => '',
    'trapNoScroll' => false,
    'disableClickAway' => false,
])

<div x-cloak
    @if ($trapNoScroll) x-trap.noscroll="{{ $showIf }}" @endif
    x-show="{{ $showIf }}"
    class="relative z-50"
    aria-labelledby="modal-title"
    role="dialog"
    aria-modal="true">
    <div x-cloak
        x-show="{{ $showIf }}"
        x-transition:enter="ease-out duration-300"
        x-transition:enter-start="opacity-0"
        x-transition:enter-end="opacity-100"
        x-transition:leave="ease-in duration-200"
        x-transition:leave-start="opacity-100"
        x-transition:leave-end="opacity-0"
        class="fixed inset-0 transition-opacity bg-gray-500 bg-opacity-75"></div>

    <div class="fixed inset-0 z-10 overflow-y-auto">
        <div class="flex items-end justify-center min-h-full p-4 text-center sm:items-start sm:p-0">
            <div x-cloak
                x-show="{{ $showIf }}"
                x-transition:enter="ease-out duration-300"
                x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100"
                x-transition:leave="ease-in duration-200"
                x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100"
                x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                x-on:keydown.escape.window="{{ $showIf }}=false"
                @if ($disableClickAway == false) x-on:click.away="{{ $showIf }}=false" @endif
                class="relative px-4 pt-5 pb-4 overflow-hidden text-left transition-all transform bg-white rounded-lg shadow-xl sm:my-8 sm:max-w-6xl {{ $width }} sm:p-6">
                <div>
                    <div class="flex justify-between">
                        <h1 class="text-2xl text-primary-700">{{ $title }}</h1>
                        <button x-on:click="{{ $showIf }}=false"
                            class="focus:outline-none hover:text-gray-500 text-primary-400">
                            <x-icons.close class="h-6" />
                        </button>
                    </div>
                    <div class="mt-5">
                        {{ $slot }}
                    </div>
                </div>
                @if ($actions)
                    <div class="mt-5 sm:mt-6">
                        <div class="flex justify-end space-x-2">
                            {{ $actions }}
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>
