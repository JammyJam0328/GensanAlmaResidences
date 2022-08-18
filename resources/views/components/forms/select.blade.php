@props([
    'label' => '',
    'model' => '',
    'defer' => true,
    'required' => false,
])
@php
$error_less_class = 'block w-full py-[10px] pl-[10px] pr-7 border border-gray-300 text-gray-900 placeholder-gray-300 focus:outline-none focus:ring-offset-2 focus:ring-2 focus:ring-primary-700 duration-100 ease-in-out focus:border-gray-300 sm:text-sm rounded-lg';
$error_class = 'block w-full py-[10px] pl-[10px] pr-7 border border-red-300 text-red-900 placeholder-red-300 focus:outline-none focus:ring-offset-2 focus:ring-2 focus:ring-red-200 duration-100 ease-in-out focus:border-red-300 sm:text-sm rounded-lg';
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
