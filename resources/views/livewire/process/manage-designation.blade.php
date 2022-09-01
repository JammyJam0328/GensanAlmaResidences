<div x-data="{ isOpen: $wire.entangle('isOpen') }">
    <x-app.modal showIf="isOpen"
        trapNoScroll
        title="Manage Room Cleaners">
        <div class="grid space-y-4 w-full">
            <div class="space-y-2 w-full">
                {{ $this->form }}
                <div class="mt-1">
                    <x-app.btn-primary wire:click="assign"
                        showLoading
                        label="Assign" />
                </div>
            </div>
            <label for="list">
                List of all room boy assigned in this floor
            </label>
            <ul id="list "
                class="space-y-2">
                @forelse ($designations as $designation)
                    <li class="p-3 rounded-md border">
                        {{ $designation->room_boy->user->name }}
                    </li>
                @empty
                    <li class="p-3 rounded-lg bg-red-200 text-red-600 border border-red-500">
                        No assigned cleaners in this floor
                    </li>
                @endforelse
            </ul>
        </div>
    </x-app.modal>
</div>
