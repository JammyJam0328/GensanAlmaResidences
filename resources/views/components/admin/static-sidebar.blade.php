<div class="hidden md:flex md:w-64 md:flex-col md:fixed md:inset-y-0">
    <!-- Sidebar component, swap this element with another sidebar if you like -->
    <div class="flex flex-col flex-1 min-h-0 bg-white border-r border-gray-200 shadow-md">
        <div class="flex flex-col flex-1 pb-4 overflow-y-auto">
            <div class="flex items-center flex-shrink-0 space-x-2">
                <div class="w-full px-5 py-4 space-y-1 text-primary-600">
                    <h1 class="uppercase ">
                        Alma Residences
                    </h1>
                    <h1 class="uppercase ">
                        GENSAN
                    </h1>
                </div>
            </div>
            <nav class="flex-1 px-2 pt-6 space-y-1 bg-white border-t">
                <x-admin.nav-link route="{{ route('admin.dashboard') }}"
                    isActive="{{ request()->is('admin/dashboard*') }}"
                    label="Dashboard">
                    <x-slot:icon>
                        <x-icons.dashboard class="h-6" />
                    </x-slot:icon>
                </x-admin.nav-link>
                <x-admin.nav-link route="{{ route('admin.manage-rates') }}"
                    isActive="{{ request()->is('admin/manage-rates*') }}"
                    label="Manage Rates">
                    <x-slot:icon>
                        <x-icons.manage-rates class="h-6" />
                    </x-slot:icon>
                </x-admin.nav-link>
                <x-admin.nav-link route="{{ route('admin.manage-rooms') }}"
                    isActive="{{ request()->is('admin/manage-rooms*') }}"
                    label="Manage Rooms">
                    <x-slot:icon>
                        <x-icons.manage-rooms class="h-6" />
                    </x-slot:icon>
                </x-admin.nav-link>
                <x-admin.nav-link route="{{ route('admin.guests') }}"
                    isActive="{{ request()->is('admin/guests*') }}"
                    label="Guests">
                    <x-slot:icon>
                        <x-icons.guests class="h-6" />
                    </x-slot:icon>
                </x-admin.nav-link>
                <x-admin.nav-link route="{{ route('admin.manage-users') }}"
                    isActive="{{ request()->is('admin/manage-users*') }}"
                    label="Manage Users">
                    <x-slot:icon>
                        <x-icons.users class="h-6" />
                    </x-slot:icon>
                </x-admin.nav-link>
            </nav>
        </div>
    </div>
</div>
