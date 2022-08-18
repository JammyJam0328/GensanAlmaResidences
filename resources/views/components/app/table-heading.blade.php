  @props(['text' => '', 'col' => '1'])
  <th colspan="{{ $col }}"
      class="px-3 py-3 text-sm font-medium tracking-wide text-left text-gray-500 uppercase">
      {{ $text }}
      {{ $slot }}
  </th>
