@props([
    'label' => '',
    'value' => '',
    'icon' => '',
])
<li class="col-span-1 bg-white divide-y divide-gray-200 rounded-lg shadow">
    <div class="relative flex items-center justify-between w-full p-4 space-x-6">
        <div class="flex-1 truncate">
            <div class="flex items-center space-x-3">
                <h3 class="text-sm font-medium text-gray-900 truncate">
                    {{ $label }}
                </h3>
            </div>
            <p class="mt-1 text-gray-500 truncate">
                {{ $value }}
            </p>
        </div>
        <div class="absolute top-0 right-2">
            {{ $icon }}
        </div>
    </div>
</li>
