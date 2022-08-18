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
            <x-icons.dashboard class="w-7 h-7" />
            <x-app.page-title text="Dashboard" />
        </div>
    </x-slot:header>
    <div class="space-y-5">
        <x-admin.statlist>
            <x-admin.statlist-item label="Check in today"
                value="100">
                <x-slot:icon>
                    <x-illustrations.check-in class="h-24 " />
                </x-slot:icon>
            </x-admin.statlist-item>
            <x-admin.statlist-item label="In House"
                value="100">
                <x-slot:icon>
                    <x-illustrations.in-house class="h-24 " />
                </x-slot:icon>
            </x-admin.statlist-item>
        </x-admin.statlist>
    </div>
</x-admin-layout>
