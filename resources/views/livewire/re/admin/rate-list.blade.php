<div>
    <div class="flex">
        <x-button primary
            wire:click="$emit('createRate')"
            label="Add Rate" />
    </div>
    @php
        $headers = ['Hours', 'Amount', 'Room Type', ''];
    @endphp
    <div class="mt-3">
        <div class="flex flex-col">
            <div class="-mx-4 -my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                <div class="inline-block min-w-full py-2 align-middle md:px-6 lg:px-8">
                    <div class="overflow-hidden shadow ring-1 ring-black ring-opacity-5 md:rounded-lg">
                        <table class="min-w-full divide-y divide-gray-300">
                            <thead class="bg-gray-50">
                                <tr>
                                    @foreach ($headers as $header)
                                        <th scope="col"
                                            class="py-3 pl-4 pr-3 text-xs font-medium tracking-wide text-left text-gray-500 uppercase sm:pl-6">
                                            {{ $header }}</th>
                                    @endforeach
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                                @forelse ($rates as $rate)
                                    <tr>
                                        <td
                                            class="py-4 pl-4 pr-3 text-sm font-medium text-gray-900 whitespace-nowrap sm:pl-6">
                                            {{ $rate->staying_hour->number }}
                                        </td>
                                        <td class="px-3 py-4 text-sm text-gray-500 whitespace-nowrap">
                                            {{ $rate->amount }}
                                        </td>
                                        <td class="px-3 py-4 text-sm text-gray-500 whitespace-nowrap">
                                            {{ $rate->type->name }}
                                        </td>
                                        <td
                                            class="relative py-4 pl-3 pr-4 text-sm font-medium text-right whitespace-nowrap sm:pr-6">
                                            <button wire:key="{{ $rate->id }}"
                                                wire:click="$emit('editRate', '{{ $rate->id }}')"
                                                class="text-indigo-600 hover:text-indigo-900">Edit<span
                                                    class="sr-only">,
                                                    Lindsay Walton</span></button>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="4"
                                            class="py-4 pl-4 pr-3 text-sm font-medium text-gray-900 whitespace-nowrap sm:pl-6">
                                            No Rates Found</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                    <div class="py-2">
                        {{ $rates->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
