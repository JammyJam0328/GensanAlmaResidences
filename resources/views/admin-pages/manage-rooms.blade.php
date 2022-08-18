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
     <template x-teleport="#backButtonContainer">
         <div class="flex items-center space-x-2">
             <h1 class="text-2xl">
                 ALMA RESIDENCES
             </h1>
         </div>
     </template>
     <x-slot:header>
         <div class="flex items-center space-x-3">
             <x-icons.manage-rooms class="w-7 h-7" />
             <x-app.page-title text="Manage Rooms" />
         </div>
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
