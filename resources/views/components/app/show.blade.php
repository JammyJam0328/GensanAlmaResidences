@props([
    'if' => '',
    'listen' => '',
    'Enter',
    'enterFrom',
    'enterTo',
    'Leave',
    'leaveFrom',
    'leaveTo',
    'child' => false,
])
@if ($child == false)
    <div x-data="{ {{ $if }}: false }"
        x-on:{{ $listen }}.window="{{ $if }}=!{{ $if }}">
@endif
<div x-cloak
    x-show="{{ $if }}"
    x-transition:enter="{{ $Enter ?? 'transition ease-out duration-300' }}"
    x-transition:enter-start="{{ $enterFrom ?? 'opacity-0' }}"
    x-transition:enter-end="{{ $enterTo ?? 'opacity-100' }}"
    x-transition:leave="{{ $Leave ?? 'transition ease-in duration-300' }}"
    x-transition:leave-start="{{ $leaveFrom ?? 'opacity-100' }}"
    x-transition:leave-end="{{ $leaveTo ?? 'opacity-0' }}"
    {{ $attributes->whereStartsWith('class') }}>
    {{ $slot }}
</div>
@if ($child == false)
    </div>
@endif
