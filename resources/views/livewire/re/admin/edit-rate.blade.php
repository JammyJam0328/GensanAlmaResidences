<div>
    <x-modal.card title="Edit Rate"
        wire:model.defer="modalOpen">
        {{ $this->form }}
        <x-slot:footer>
            <x-button primary
                wire:click="update"
                spinner="update"
                label="Save" />
        </x-slot:footer>
    </x-modal.card>
</div>
