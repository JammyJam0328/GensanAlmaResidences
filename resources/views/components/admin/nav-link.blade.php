@props([
    'label' => '',
    'icon' => '',
    'route' => '',
    'isActive' => false,
])
<a href="{{ $route }}"
    @class([
        'flex items-center px-3 py-2 font-medium ease-in-out duration-100  text-gray-600 rounded-lg  group',
        'hover:bg-gray-50 hover:text-gray-900' => !$isActive,
        'bg-primary-700 text-gray-100 shadow' => $isActive,
    ])>
    @if ($icon)
        <div class="mr-2">
            {{ $icon }}
        </div>
    @endif
    <span>{{ $label }} </span>
</a>
