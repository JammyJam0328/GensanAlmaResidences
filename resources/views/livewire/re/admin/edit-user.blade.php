<div>
    <x-modal.card title="Update User"
        wire:model.defer="modalOpen">
        {{ $this->form }}
        <x-slot:footer>
            <x-button primary
                wire:click="update"
                spinner="update"
                label="Update" />
        </x-slot:footer>
    </x-modal.card>
</div>
