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
    <x-slot:header>
        <x-app.page-title text="Manage Rates" />
    </x-slot:header>
    <livewire:tables.rates />
    <livewire:process.create-rate :roomTypes="$roomTypes"
        :stayingHours="$stayingHours" />
    <livewire:process.edit-rate :roomTypes="$roomTypes"
        :stayingHours="$stayingHours" />
</x-admin-layout>
