<div>
    <x-modal.card title="Create Room"
        wire:model.defer="modalOpen">
        {{ $this->form }}
        <x-slot:footer>
            <x-button primary
                label="Save"
                wire:click="save"
                spinner="save" />
        </x-slot:footer>
    </x-modal.card>
</div>
