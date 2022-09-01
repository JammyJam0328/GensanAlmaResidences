<div x-data="{ isOpen: $wire.entangle('isOpen') }">
    <x-app.modal showIf="isOpen"
        trapNoScroll
        title="Update User">
        {{ $this->form }}
        <x-slot:actions>
            <x-app.btn-primary wire:click="update"
                showLoading
                label="Update" />
        </x-slot:actions>
    </x-app.modal>
</div>
