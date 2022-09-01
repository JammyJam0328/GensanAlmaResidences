<x-housekeeping-layout>
    <template x-teleport="#backButtonContainer">
        <div class="flex items-center space-x-2">
            <h1 class="text-2xl">
                ALMA RESIDENCES
            </h1>
        </div>
    </template>
    <x-slot:header>
        <div class="flex items-center space-x-3">
            <x-icons.rooms-monitoring class="w-7 h-7" />
            <x-app.page-title text="Room Monitoring" />
        </div>
    </x-slot:header>
    <livewire:tables.rooms-monitoring />
</x-housekeeping-layout>
