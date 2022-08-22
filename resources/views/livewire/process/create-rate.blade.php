<div>
    <div x-data="{ isOpen: false }"
        x-on:create-rate.window="isOpen=true"
        x-on:close-create-modal.window="isOpen=false">
        <x-app.modal showIf="isOpen"
            trapNoScroll
            title="Create Rates">
            {{ $this->form }}
            <x-slot:actions>
                <x-app.btn-primary wire:click="save"
                    showLoading
                    label="Submit" />
            </x-slot:actions>
        </x-app.modal>
    </div>
</div>
