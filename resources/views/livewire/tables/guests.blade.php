<div>
    <x-app.table title="Guests"
        description="List of all guest checked in">
        <x-slot:actions>
            <div class="flex items-center space-x-2">
                <x-forms.input placeholder="Search" />
            </div>
        </x-slot:actions>
        <x-slot:thead>
            <x-app.table-heading text="Qr Code" />
            <x-app.table-heading text="Name" />
            <x-app.table-heading text="Contact Number" />
            <x-app.table-heading />
        </x-slot:thead>
        @forelse ($guests as $guest)
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
                        <x-app.btn-default showLoading
                            wire:click="setGuest({{ $guest->id }})"
                            label="View" />
                    </div>
                </x-app.table-data>
            </x-app.table-row>
        @empty
            <x-app.table-row>
                <x-app.table-data col="4">
                    <div class="text-center">
                        <p class="text-lg font-medium">
                            No guest found
                        </p>
                    </div>
                </x-app.table-data>
            </x-app.table-row>
        @endforelse
        <x-slot:pagination>
            {{ $guests->links() }}
        </x-slot:pagination>
    </x-app.table>
</div>
