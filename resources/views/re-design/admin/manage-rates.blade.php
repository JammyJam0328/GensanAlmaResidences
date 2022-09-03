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

@extends('layouts.admin')
@section('title', 'Rates')
@section('content')
    <div>
        @livewire('re.admin.rate-list')
        @livewire('re.admin.create-rate', [
            'roomTypes' => $roomTypes,
            'stayingHours' => $stayingHours,
        ])
        @livewire('re.admin.edit-rate', [
            'roomTypes' => $roomTypes,
            'stayingHours' => $stayingHours,
        ])
    </div>
@endsection
