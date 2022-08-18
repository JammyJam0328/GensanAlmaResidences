<div>
    <div x-data="{ isOpen: $wire.entangle('isOpen') }">
        <x-app.modal showIf="isOpen"
            title="Manage Room Rates">
            <x-forms.container>
                {{ $selected_type }}
                <fieldset>
                    <legend class="text-lg font-medium text-gray-900">Room Types</legend>
                    <div class="mt-4 border-t border-b border-gray-200 divide-y divide-gray-200">
                        @foreach ($types as $key => $type)
                            <div wire:key="{{ $key . $type->id }}"
                                class="relative flex items-start py-4">
                                <div class="flex-1 min-w-0 text-sm">
                                    <label for="person-4"
                                        class="font-medium text-gray-700 select-none">{{ $type->name }}</label>
                                </div>
                                <div class="flex items-center h-5 ml-3">
                                    <input wire:model="selected_type"
                                        value="{{ $type->id }}"
                                        id="{{ $key . $type->id }}"
                                        name="{{ $key . $type->id }}"
                                        type="checkbox"
                                        class="w-4 h-4 border-gray-300 rounded text-primary-600 focus:ring-primary-500">
                                </div>
                            </div>
                        @endforeach
                    </div>
                </fieldset>
            </x-forms.container>
        </x-app.modal>
    </div>
</div>
