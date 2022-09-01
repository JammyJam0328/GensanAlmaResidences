<div>
    <x-app.table title="Floors"
        description="List of all floor belongs to Alma Residences">
        {{-- <x-slot:actions>
            <div class="flex items-center space-x-2">
                <div class="mt-1">
                    <x-app.btn-primary x-on:click="$dispatch('create-rate')"
                        label="Add Rate" />
                </div>
            </div>
        </x-slot:actions> --}}
        <x-slot:thead>
            <x-app.table-heading text="Floor Number" />
            <x-app.table-heading text="Room Count" />
            <x-app.table-heading />
        </x-slot:thead>
        @forelse ($floors as $floor)
            <x-app.table-row>
                <x-app.table-data>
                    {{ ordinal($floor->number) }} FLOOR
                </x-app.table-data>
                <x-app.table-data>
                    {{ Str::plural($floor->rooms_count . ' ROOM', $floor->rooms_count) }}
                </x-app.table-data>

                <x-app.table-data>
                    <div class="flex justify-end space-x-2">
                        <x-app.btn-default wire:click="$emit('manageFloorCleaners', {{ $floor->id }})"
                            label="Manage" />
                    </div>
                </x-app.table-data>
            </x-app.table-row>
        @empty
            <x-app.table-row>
                <x-app.table-data col="4">
                    <div class="text-center">
                        <p class="text-lg font-medium">
                            No rates found
                        </p>
                    </div>
                </x-app.table-data>
            </x-app.table-row>
        @endforelse
        <x-slot:pagination>
            {{ $floors->links() }}
        </x-slot:pagination>
    </x-app.table>
</div>
