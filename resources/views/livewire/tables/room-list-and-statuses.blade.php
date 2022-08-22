<div>
    <x-app.table title="Rooms"
        description="List of all rooms belongs to Alma Residences">
        <x-slot:actions>
            <div class="flex items-center space-x-4">
                <x-forms.input wire:model.debounce="search"
                    placeholder="Search" />
                <x-forms.select wire:model.debounce="filter.floor">
                    <option value="">Filter Floor (All)</option>
                    @foreach ($floors as $key => $floor)
                        <option value="{{ $key }}">{{ $floor }}</option>
                    @endforeach
                </x-forms.select>
                <x-forms.select wire:model.debounce="filter.room_status">
                    <option value="">Filter Status (All)</option>
                    @foreach ($roomStatuses as $key => $roomStatuse)
                        <option value="{{ $key }}">{{ $roomStatuse }}</option>
                    @endforeach
                </x-forms.select>
            </div>
        </x-slot:actions>
        <x-slot:thead>
            <x-app.table-heading text="Room Number" />
            <x-app.table-heading text="Floor" />
            <x-app.table-heading text="Status" />
            <x-app.table-heading text="Types" />
            <x-app.table-heading text="" />
        </x-slot:thead>
        @forelse ($rooms as $room)
            <tr>
                <x-app.table-data>
                    Room #{{ $room->number }}
                </x-app.table-data>
                <x-app.table-data>
                    {{ ordinal($room->floor->number) }} Floor
                </x-app.table-data>
                <x-app.table-data>
                    {{ $room->room_status->name }}
                </x-app.table-data>
                <x-app.table-data>
                    <div>
                        @if (count($room->types))
                            {{ implode('/', $room->types->pluck('name')->toArray()) }}
                        @else
                            No Types
                        @endif
                    </div>
                </x-app.table-data>
                <x-app.table-data>
                    <x-app.btn-default label="Update" />
                </x-app.table-data>
            </tr>
        @empty
            <tr>
                <x-app.table-data col="4">
                    <div class="text-center">
                        <p class="text-lg font-medium">
                            No rooms found
                        </p>
                    </div>
                </x-app.table-data>
            </tr>
        @endforelse
        <x-slot:pagination>
            {{ $rooms->links() }}
        </x-slot:pagination>
    </x-app.table>
</div>
