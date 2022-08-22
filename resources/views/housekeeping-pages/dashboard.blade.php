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
            <x-icons.dashboard class="w-7 h-7" />
            <x-app.page-title text="Dashboard" />
        </div>
    </x-slot:header>
</x-housekeeping-layout>
