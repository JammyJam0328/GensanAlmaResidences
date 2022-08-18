@props(['header' => ''])
    bodyClass="h-full">
    <div>
        <x-admin.mobile-sidebar />
        <x-frontdesk.static-sidebar />
        <div class="flex flex-col flex-1 md:pl-64">
            <div class="sticky top-0 z-10 pt-1 pl-1 bg-gray-100 md:hidden sm:pl-3 sm:pt-3">
                <button type="button"
                    class="-ml-0.5 -mt-0.5 h-12 w-12 inline-flex items-center justify-center rounded-md text-gray-500 hover:text-gray-900 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-indigo-500">
                    <span class="sr-only">Open sidebar</span>
                    <!-- Heroicon name: outline/menu -->
                    <svg class="w-6 h-6"
                        xmlns="http://www.w3.org/2000/svg"
                        fill="none"
                        viewBox="0 0 24 24"
                        stroke-width="2"
                        stroke="currentColor"
                        aria-hidden="true">
                        <path stroke-linecap="round"
                            stroke-linejoin="round"
                            d="M4 6h16M4 12h16M4 18h16" />
                    </svg>
                </button>
            </div>
            <main class="flex-1">
                <x-frontdesk.sticky-top>
                    <div class="flex items-center justify-between w-full px-6 py-3 ">
                        <div id="backButtonContainer">

                        </div>
                        <x-admin.quick-menus />
                    </div>
                </x-frontdesk.sticky-top>
                <div class="py-6">
                    <div class="px-4 mx-auto max-w-7xl sm:px-6 md:px-8">
                        {{ $header ?? '' }}
                    </div>
                    <div class="px-4 mx-auto mt-5 max-w-7xl sm:px-6 md:px-8">
                        {{ $slot }}
                    </div>
                </div>
            </main>
        </div>
    </div>
</x-app>
