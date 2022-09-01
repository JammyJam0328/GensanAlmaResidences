<div>
    <x-app.table title="Users"
        description="List of all users belongs to Alma Residences">
        <x-slot:actions>
            <div class="flex items-center space-x-2">
                <div class="mt-1">
                    <x-app.btn-primary x-on:click="$dispatch('create-user')"
                        label="Add User" />
                </div>
            </div>
        </x-slot:actions>
        <x-slot:thead>
            <x-app.table-heading text="Name" />
            <x-app.table-heading text="Email" />
            <x-app.table-heading text="Role" />
            <x-app.table-heading />
        </x-slot:thead>
        @forelse ($users as $user)
            <x-app.table-row>
                <x-app.table-data>
                    {{ $user->name }}
                </x-app.table-data>
                <x-app.table-data>
                    {{ $user->email }}
                </x-app.table-data>
                <x-app.table-data>
                    {{ $user->role->name }}
                </x-app.table-data>
                <x-app.table-data>
                    <div class="flex justify-end space-x-2">
                        <x-app.btn-default wire:click.prevent="$emit('edit', {{ $user->id }})"
                            label="Edit" />
                    </div>
                </x-app.table-data>
            </x-app.table-row>
        @empty
            <x-app.table-row>
                <x-app.table-data col="4">
                    <div class="text-center">
                        <p class="text-lg font-medium">
                            No users found
                        </p>
                    </div>
                </x-app.table-data>
            </x-app.table-row>
        @endforelse
        <x-slot:pagination>
            {{ $users->links() }}
        </x-slot:pagination>
    </x-app.table>
</div>
