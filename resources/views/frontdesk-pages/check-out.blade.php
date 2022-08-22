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
            <x-icons.check-out class="w-7 h-7" />
            <x-app.page-title text="Check Out" />
        </div>
    </x-slot:header>
    <livewire:process.check-out />
</x-frontdesk-layout>
