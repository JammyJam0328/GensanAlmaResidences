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
            <x-icons.guests class="w-7 h-7" />
            <x-app.page-title text="Guests" />
        </div>
    </x-slot:header>
    <livewire:tables.guests />
    <livewire:process.view-guest-info />
</x-frontdesk-layout>
