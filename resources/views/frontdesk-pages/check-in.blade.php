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
            <x-icons.check-in class="w-7 h-7" />
            <x-app.page-title text="Check In" />
        </div>
    </x-slot:header>
    <div class="gap-4 sm:grid sm:grid-cols-12">
        <div class="sm:col-span-8">
            <livewire:tables.check-in />
        </div>
        <div class=" sm:col-span-4">
            <livewire:tables.recent-check-in-list />
        </div>
    </div>
    <div>
        <livewire:process.view-and-check-in />
    </div>
</x-frontdesk-layout>
