<div>
    <x-app.table title="Rooms"
        description="List of all rooms belongs to Alma Residences">
        <x-slot:thead>
            <x-app.table-heading text="Room Number" />
            <x-app.table-heading text="Time To Clean" />
            <x-app.table-heading />
        </x-slot:thead>
        @forelse ($rooms as $room)
            <x-app.table-row>
                <x-app.table-data>
                    Room #{{ $room->number }}
                </x-app.table-data>
                <x-app.table-data>
                    @php
                        $timeToClean = new Carbon\Carbon($room->time_to_clean);
                    @endphp
                    @if ($room->time_to_clean)
                        <x-countdown :expires="$timeToClean" />
                    @endif
                </x-app.table-data>
                <x-app.table-data>
                    <div class="flex justify-end">
                        <x-app.btn-default label="Option" />
                    </div>
                </x-app.table-data>
            </x-app.table-row>
        @empty
            <x-app.table-row>
                <x-app.table-data col="3">
                    <div class="text-center">
                        <p class="text-lg font-medium">
                            No rooms found
                        </p>
                    </div>
                </x-app.table-data>
            </x-app.table-row>
        @endforelse
        <x-slot:pagination>
            {{ $rooms->links() }}
        </x-slot:pagination>
    </x-app.table>
</div>
