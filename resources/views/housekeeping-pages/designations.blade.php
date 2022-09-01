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
            <x-icons.designation class="w-7 h-7" />
            <x-app.page-title text="Designations" />
        </div>
    </x-slot:header>
    <div class="space-y-3">
        <livewire:tables.designations />
        <livewire:process.manage-designation />
    </div>
</x-housekeeping-layout>
