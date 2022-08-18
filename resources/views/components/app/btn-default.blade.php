@props([
    'label' => '',
    'type' => 'button',
    'iconRight' => false,
    'showLoading' => false,
    'textColor' => 'gray',
])
@php
$wire_method = $attributes->whereStartsWith('wire:click')->first();
@endphp
<{{ $attributes->whereStartsWith('href')->first() ? 'a' : 'button' }} type="{{ $type }}"
    {{ $attributes->whereStartsWith('href') }}
    {{ $attributes->whereStartsWith('wire:click') }}
    {{ $attributes->whereStartsWith('x-on:click') }}
    wire:target="{{ $wire_method }}"
    wire:loading.class="cursor-progress"
    wire:loading.attr="disabled"
    class="inline-flex items-center px-4 py-[7px] font-medium text-{{ $textColor }}-500 duration-100 ease-in-out focus:ring-offset-2 focus:ring-2 focus:ring-primary-700 bg-white border border-{{ $textColor }}-300 rounded-lg shadow-sm focus:shadow-md hover:bg-{{ $textColor }}-50 focus:outline-none ">
    @if ($iconRight == false)
        <div @if ($showLoading) wire:loading.remove
            wire:target="{{ $wire_method }}" @endif>
            {{ $slot }}
        </div>
        @if ($showLoading)
            <div wire:loading
                wire:target="{{ $wire_method }}">
                <svg xmlns="http://www.w3.org/2000/svg"
                    class="w-6 h-6 animate-spin"
                    fill="none"
                    viewBox="0 0 24 24"
                    stroke="currentColor"
                    stroke-width="2">
                    <path stroke-linecap="round"
                        stroke-linejoin="round"
                        d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z" />
                    <path stroke-linecap="round"
                        stroke-linejoin="round"
                        d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                </svg>
            </div>
        @endif
    @endif
    <span>
        {{ $label }}
    </span>
    @if ($iconRight == true)
        <div
            @if ($showLoading) wire:loading.remove
            wire:target="{{ $wire_method }}" @endif>
            {{ $slot }}
        </div>
        @if ($showLoading)
            <div wire:loading
                wire:target="{{ $wire_method }}">
                <svg xmlns="http://www.w3.org/2000/svg"
                    class="w-6 h-6 animate-spin"
                    fill="none"
                    viewBox="0 0 24 24"
                    stroke="currentColor"
                    stroke-width="2">
                    <path stroke-linecap="round"
                        stroke-linejoin="round"
                        d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z" />
                    <path stroke-linecap="round"
                        stroke-linejoin="round"
                        d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                </svg>
            </div>
        @endif
    @endif
    </{{ $attributes->whereStartsWith('href')->first() ? 'a' : 'button' }}>
