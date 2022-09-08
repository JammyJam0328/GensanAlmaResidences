<div>
    <x-modal.card wire:model.defer="modalOpen"
        title="Add Damages">
        <form>
            @csrf
            <div class="gap-3 sm:grid sm:grid-cols-2">
                <x-input label="Damage Item"
                    list="autocompletedata"
                    autocomplete="on" />
                <datalist id="autocompletedata">
                    @foreach ($damages as $damage)
                        <option value="{{ $damage }}">
                    @endforeach
                </datalist>
                <x-input label="Amount" />
                <x-input label="Occured At"
                    type="Datetime-local" />
            </div>
        </form>
        <x-slot:footer>
            <x-button label="Save"
                primary />
        </x-slot:footer>
    </x-modal.card>
</div>
