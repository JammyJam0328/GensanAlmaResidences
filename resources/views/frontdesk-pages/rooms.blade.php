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
 @endphp
 <x-frontdesk-layout>
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
             <x-app.page-title text="Rooms" />
         </div>
     </x-slot:header>
     <livewire:tables.room-list-and-statuses :floors="$floors"
         :roomStatuses="$roomStatuses" />
 </x-frontdesk-layout>
