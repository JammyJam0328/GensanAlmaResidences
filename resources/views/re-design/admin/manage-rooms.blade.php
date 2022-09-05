 @php
     $floors = \App\Models\Floor::get()
         ->mapWithKeys(function ($floor) {
             return [
                 $floor->id => ordinal($floor->number) . ' Floor',
             ];
         })
         ->toArray();
     $roomStatuses = \App\Models\RoomStatus::get()
         ->mapWithKeys(function ($status) {
             return [
                 $status->id => $status->name,
             ];
         })
         ->toArray();
     $types = \App\Models\Type::whereHas('rates')
         ->get()
         ->mapWithKeys(function ($type) {
             return [
                 $type->id => $type->name,
             ];
         })
         ->toArray();
 @endphp
 @extends('layouts.admin')
 @section('title', 'Rooms')
 @section('content')
     <div>
         @livewire('re.admin.room-list', [
             'floors' => $floors,
             'roomStatuses' => $roomStatuses,
         ])
         @livewire('re.admin.create-room', [
             'floors' => $floors,
             'roomStatuses' => $roomStatuses,
             'types' => $types,
         ])
         @livewire('re.admin.edit-room', [
             'floors' => $floors,
             'roomStatuses' => $roomStatuses,
             'types' => $types,
         ])
     </div>
 @endsection
