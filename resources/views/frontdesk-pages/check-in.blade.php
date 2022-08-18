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
    <div class="sm:grid sm:grid-cols-12">
        <div class="sm:col-span-8">
            <livewire:process.scan-qr-check-in />
        </div>
        <div class=" sm:col-span-4">

        </div>
    </div>
</x-frontdesk-layout>
