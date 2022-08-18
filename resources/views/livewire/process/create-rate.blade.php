<div>
    <div x-data="{ isOpen: false }"
        x-on:create-rate.window="isOpen=true"
        x-on:close-create-modal.window="isOpen=false">
        <x-app.modal showIf="isOpen"
            title="Create Rates">
            {{ $this->form }}
            <x-slot:actions>
                <x-app.btn-primary wire:click="save"
                    label="Submit" />
            </x-slot:actions>
        </x-app.modal>
    </div>
</div>
