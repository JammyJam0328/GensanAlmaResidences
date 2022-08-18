<div>
    <x-app.table title="Rates"
        description="List of all rates belongs to Alma Residences">
        <x-slot:actions>
            <div class="flex items-center space-x-2">
                <div class="mt-1">
                    <x-app.btn-primary x-on:click="$dispatch('create-rate')"
                        label="Add Rate" />
                </div>
            </div>
        </x-slot:actions>
        <x-slot:thead>
            <x-app.table-heading text="Hours" />
            <x-app.table-heading text="Amount" />
            <x-app.table-heading text="Room Type" />
            <x-app.table-heading />
        </x-slot:thead>
        @forelse ($rates as $rate)
            <tr>
                <x-app.table-data>
                    {{ $rate->staying_hour->number }} {{ Str::plural('hour', $rate->staying_hour->number) }}
                </x-app.table-data>
                <x-app.table-data>
                    {{ $rate->amount }} Pesos
                </x-app.table-data>
                <x-app.table-data>
                    {{ $rate->type->name }}
                </x-app.table-data>
                <x-app.table-data>
                    <div class="flex justify-end space-x-2">
                        <x-app.btn-default wire:click.prevent="$emit('edit', {{ $rate->id }})"
                            label="Edit" />
                    </div>
                </x-app.table-data>
            </tr>
        @empty
            <tr>
                <x-app.table-data col="4">
                    <div class="text-center">
                        <p class="text-lg font-medium">
                            No rates found
                        </p>
                    </div>
                </x-app.table-data>
            </tr>
        @endforelse
        <x-slot:pagination>
            {{ $rates->links() }}
        </x-slot:pagination>
    </x-app.table>
</div>
