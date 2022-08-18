@props([
    'type' => 'text',
    'label' => '',
    'model' => '',
    'defer' => true,
    'required' => false,
])
@php
$error_less_class = 'block w-full transition duration-75 rounded-lg shadow-sm focus:border-primary-600 focus:ring-1 focus:ring-inset focus:ring-primary-600 disabled:opacity-70 border-gray-300';
$error_class = 'block w-full transition duration-75 rounded-lg shadow-sm focus:border-primary-600 focus:ring-1 focus:ring-inset focus:ring-primary-600 disabled:opacity-70 border-danger-600 ring-danger-600';
$has_error = $errors->has($attributes->whereStartsWith('wire:model')->first());
$model_name = $attributes->whereStartsWith('wire:model')->first();
$has_model = $attributes->whereStartsWith('wire:model')->first() !== null;
$element_id = $model_name ?? uniqid();
@endphp
<div id="{{ $element_id }}-container">
    @if ($label != '')
        <label for="{{ $element_id }}"
            class="block text-sm font-medium text-gray-700">
            {{ $label }} @if ($required)
                <span class="text-red-500">*</span>
            @endif
        </label>
    @endif
    <div class="relative mt-1 rounded-md shadow-sm">
        <input type="{{ $type }}"
            {{ $attributes->whereStartsWith('multiple') }}
            {{ $attributes->whereStartsWith('wire:model') }}
            {{ $attributes->whereStartsWith('wire:ignore') }}
            {{ $attributes->whereStartsWith('placeholder') }}
            @if ($has_model) class="{{ $has_error ? $error_class : $error_less_class }}"
            @else
                class="{{ $error_less_class }}" @endif
            id="{{ $element_id }}"
            name="{{ $element_id }}">
        @if ($has_model == 1)
            <div class="absolute inset-y-0 right-0 flex items-center pr-3 pointer-events-none">
                @if ($errors->has($model_name))
                    <svg class="w-5 h-5 text-red-500"
                        xmlns="http://www.w3.org/2000/svg"
                        viewBox="0 0 20 20"
                        fill="currentColor"
                        aria-hidden="true">
                        <path fill-rule="evenodd"
                            d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z"
                            clip-rule="evenodd" />
                    </svg>
                @endif
            </div>
        @endif
    </div>
    @if ($has_model)
        @error($model_name)
            <p class="mt-2 text-sm text-danger-600 ">
                {{ $message }}
            </p>
        @enderror
    @endif
</div>
