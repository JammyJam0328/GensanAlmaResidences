<div>
    <x-app.table title="Guest to check in"
        description="List of all guest to check in">
        <x-slot:actions>
            <div x-data
                x-on:focus-search-bar.window="$refs.searchInput.focus()"
                class="flex items-center space-x-4">
                <div class="mt-1">
                    <div class="flex space-x-2">
                        <x-forms.input x-ref="searchInput"
                            wire:model.debounce.500ms="search"
                            placeholder="{{ $searchBy == '1' ? 'Start Scanning...' : 'Start Typing...' }}" />
                        <x-forms.select wire:model="searchBy">
                            <option value="1">Search By Qr Code</option>
                            <option value="2">Search By Name</option>
                            <option value="3">Search By Contact Number</option>
                        </x-forms.select>
                    </div>
                </div>
            </div>
        </x-slot:actions>
        <x-slot:thead>
            <x-app.table-heading text="Qr Code" />
            <x-app.table-heading text="Name" />
            <x-app.table-heading text="Contact Number" />
            <x-app.table-heading />
        </x-slot:thead>
        @forelse ($inline_guests as $guest)
            <x-app.table-row>
                <x-app.table-data>
                    {{ $guest->qr_code }}
                </x-app.table-data>
                <x-app.table-data>
                    {{ $guest->name }}
                </x-app.table-data>
                <x-app.table-data>
                    {{ $guest->contact_number }}
                </x-app.table-data>
                <x-app.table-data>
                    <div class="flex justify-end space-x-2">
                        <x-app.btn-default wire:click="$emit('viewGuest',{{ $guest->id }})"
                            label="View" />
                    </div>
                </x-app.table-data>
            </x-app.table-row>
        @empty
            <x-app.table-row>
                <x-app.table-data col="4">
                    <div class="text-center">
                        <p class="text-lg font-medium">
                            No rooms found
                        </p>
                    </div>
                </x-app.table-data>
            </x-app.table-row>
        @endforelse
        <x-slot:pagination>
            {{ $inline_guests->links() }}
        </x-slot:pagination>
    </x-app.table>

</div>
