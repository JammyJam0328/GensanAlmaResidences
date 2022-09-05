<div>
    <x-modal.card title="Update Room"
        wire:model.defer="modalOpen">
        {{ $this->form }}
        <x-slot:footer>
            <x-button primary
                label="Update"
                wire:click="update"
                spinner="update" />
        </x-slot:footer>
    </x-modal.card>
</div>
