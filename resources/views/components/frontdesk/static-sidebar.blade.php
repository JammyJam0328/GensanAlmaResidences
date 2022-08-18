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
                <x-frontdesk.nav-link route="{{ route('frontdesk.dashboard') }}"
                    isActive="{{ request()->is('frontdesk/dashboard*') }}"
                    label="Dashboard">
                    <x-slot:icon>
                        <x-icons.dashboard class="h-6" />
                    </x-slot:icon>
                </x-frontdesk.nav-link>
                <x-frontdesk.nav-link route="{{ route('frontdesk.check-in') }}"
                    isActive="{{ request()->is('frontdesk/check-in*') }}"
                    label="Check In">
                    <x-slot:icon>
                        <x-icons.check-in class="h-6" />
                    </x-slot:icon>
                </x-frontdesk.nav-link>
                <x-frontdesk.nav-link route="{{ route('frontdesk.check-out') }}"
                    isActive="{{ request()->is('frontdesk/check-out*') }}"
                    label="Check Out">
                    <x-slot:icon>
                        <x-icons.check-out class="h-6" />
                    </x-slot:icon>
                </x-frontdesk.nav-link>
                <x-frontdesk.nav-link route="{{ route('frontdesk.guests') }}"
                    isActive="{{ request()->is('frontdesk/guests*') }}"
                    label="Guests">
                    <x-slot:icon>
                        <x-icons.guests class="h-6" />
                    </x-slot:icon>
                </x-frontdesk.nav-link>
                <x-frontdesk.nav-link route="{{ route('frontdesk.transactions') }}"
                    isActive="{{ request()->is('frontdesk/transactions*') }}"
                    label="Transactions">
                    <x-slot:icon>
                        <x-icons.transactions class="h-6" />
                    </x-slot:icon>
                </x-frontdesk.nav-link>
            </nav>
        </div>
    </div>
</div>
