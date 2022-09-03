<div>
    <x-modal.card title="Create Rate"
        wire:model.defer="modalOpen">
        {{ $this->form }}
        <x-slot:footer>
            <x-button primary
                wire:click="save"
                spinner="save"
                label="Save" />
        </x-slot:footer>
    </x-modal.card>
</div>
