@php
$stayingHours = \App\Models\StayingHour::get()
    ->mapWithKeys(function ($hour) {
        return [
            $hour->id => $hour->number . ' ' . Str::plural('hour', $hour->number),
        ];
    })
    ->toArray();
$roomTypes = \App\Models\Type::get()
    ->mapWithKeys(function ($type) {
        return [
            $type->id => $type->name,
        ];
    })
    ->toArray();
@endphp

<x-admin-layout>
    <template x-teleport="#backButtonContainer">
        <div class="flex items-center space-x-2">
            <h1 class="text-2xl">
                ALMA RESIDENCES
            </h1>
        </div>
    </template>
    <x-slot:header>
        <div class="flex items-center space-x-3">
            <x-icons.manage-rates class="w-7 h-7" />
            <x-app.page-title text="Manage Rates" />
        </div>
    </x-slot:header>
    <livewire:tables.rates />
    <livewire:process.create-rate :roomTypes="$roomTypes"
        :stayingHours="$stayingHours" />
    <livewire:process.edit-rate :roomTypes="$roomTypes"
        :stayingHours="$stayingHours" />
</x-admin-layout>
