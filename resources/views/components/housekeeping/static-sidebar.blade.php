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
                <x-housekeeping.nav-link route="{{ route('house-keeping.dashboard') }}"
                    isActive="{{ request()->is('house-keeping/dashboard*') }}"
                    label="Dashboard">
                    <x-slot:icon>
                        <x-icons.dashboard class="h-6" />
                    </x-slot:icon>
                </x-housekeeping.nav-link>
                <x-housekeeping.nav-link route="{{ route('house-keeping.designations') }}"
                    isActive="{{ request()->is('house-keeping/designations*') }}"
                    label="Designations">
                    <x-slot:icon>
                        <x-icons.designation class="h-6" />
                    </x-slot:icon>
                </x-housekeeping.nav-link>
                <x-housekeeping.nav-link route="{{ route('house-keeping.room-boy') }}"
                    isActive="{{ request()->is('house-keeping/room-boy*') }}"
                    label="Room Boy">
                    <x-slot:icon>
                        <x-icons.room-boy class="h-6" />
                    </x-slot:icon>
                </x-housekeeping.nav-link>
            </nav>
        </div>
    </div>
</div>
