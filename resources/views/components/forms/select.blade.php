@props([
    'label' => '',
    'model' => '',
    'defer' => true,
    'required' => false,
])
@php
$error_less_class = 'text-gray-900 block w-full transition duration-75 rounded-lg shadow-sm focus:border-primary-600 focus:ring-1 focus:ring-inset focus:ring-primary-600 disabled:opacity-70 border-gray-300';
$error_class = 'text-gray-900 block w-full transition duration-75 rounded-lg shadow-sm focus:border-primary-600 focus:ring-1 focus:ring-inset focus:ring-primary-600 disabled:opacity-70 border-danger-600 ring-danger-600';
$model_name = $attributes->whereStartsWith('wire:model')->first();
$has_error = $errors->has($model_name);
$has_model = $model_name !== null;
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
    <div class="mt-1 ">
        <select id="{{ $element_id }}"
            name="{{ $element_id }}"
            {{ $attributes->whereStartsWith('wire:model') }}
            @if ($has_model) class="{{ $has_error ? $error_class : $error_less_class }}"
            @else
                class="{{ $error_less_class }}" @endif>
            {{ $slot }}
        </select>
    </div>
    @if ($has_model)
        @error($model_name)
            <p class="mt-2 text-sm text-red-600">
                {{ $message }}
            </p>
        @enderror
    @endif
</div>
