@php
$roles = \App\Models\Role::get()
    ->mapWithKeys(function ($role) {
        return [
            $role->id => $role->name,
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
            <x-icons.users class="w-7 h-7" />
            <x-app.page-title text="Manage Users" />
        </div>
    </x-slot:header>
    <div class="space-y-5">
        <livewire:tables.users-list />
        <livewire:process.create-user :roles="$roles" />
        <livewire:process.edit-user :roles="$roles" />
    </div>
</x-admin-layout>
