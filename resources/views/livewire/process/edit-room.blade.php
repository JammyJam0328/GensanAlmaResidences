<div>
    <div x-data="{ isOpen: $wire.entangle('isOpen') }">
        <x-app.modal showIf="isOpen"
            title="Update Rates">
            {{ $this->form }}
            <x-slot:actions>
                <x-app.btn-primary wire:click="update"
                    label="Update" />
            </x-slot:actions>
        </x-app.modal>
    </div>
</div>
