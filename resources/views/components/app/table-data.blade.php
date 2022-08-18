@props(['text' => '', 'col' => '1'])
<td colspan="{{ $col }}"
    class="px-3 py-2.5 text-sm text-gray-500 whitespace-nowrap">
    {{ $slot }}
</td>
