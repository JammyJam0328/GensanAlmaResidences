 @php
     $floors = \App\Models\Floor::get()
         ->mapWithKeys(function ($floor) {
             return [
                 $floor->id => ordinal($floor->number) . ' Floor',
             ];
         })
         ->toArray();
     $roomStatuses = \App\Models\RoomStatus::get()
         ->where('id', '!=', '6')
         ->mapWithKeys(function ($status) {
             return [
                 $status->id => $status->name,
             ];
         })
         ->toArray();
     $types = \App\Models\Type::get()
         ->mapWithKeys(function ($type) {
             return [
                 $type->id => $type->name,
             ];
         })
         ->toArray();
 @endphp

 <x-admin-layout>
     <x-slot:header>
         <x-app.page-title text="Manage Rooms" />
     </x-slot:header>
     <div>
         <livewire:tables.rooms :floors="$floors"
             :roomStatuses="$roomStatuses" />
         <livewire:process.create-room :types="$types"
             :floors="$floors"
             :roomStatuses="$roomStatuses" />
         <livewire:process.edit-room :types="$types"
             :floors="$floors"
             :roomStatuses="$roomStatuses" />
     </div>
 </x-admin-layout>
