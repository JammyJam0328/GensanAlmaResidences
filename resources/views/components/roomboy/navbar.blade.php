<div>
    <nav class="bg-gray-800">
        <div class="px-4 mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="flex items-center justify-between h-16">
                <div class="flex items-center">
                    <div class="flex-shrink-0">
                        <h1 class="text-xl text-white">
                            Alma Residences Gensan
                        </h1>
                    </div>
                </div>
                <div class="sm:ml-6 ">
                    <div x-data="{ isOpen: false }"
                        class="flex items-center">
                        <div class="relative ml-3">
                            <div>
                                <button x-on:click="isOpen=!isOpen"
                                    type="button"
                                    class="flex text-sm bg-gray-800 rounded-full focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-800 focus:ring-white"
                                    id="user-menu-button"
                                    aria-expanded="false"
                                    aria-haspopup="true">
                                    <span class="sr-only">Open user menu</span>
                                    <img class="w-8 h-8 rounded-full"
                                        src="{{ auth()->user()->profile_photo_url }}"
                                        alt="">
                                </button>
                            </div>
                            <div x-cloak
                                x-show="isOpen"
                                x-transition
                                x-on:click.away="isOpen=false"
                                class="absolute right-0 w-48 py-1 mt-2 origin-top-right bg-white rounded-md shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none"
                                role="menu"
                                aria-orientation="vertical"
                                aria-labelledby="user-menu-button"
                                tabindex="-1">
                                <a href="#"
                                    class="block px-4 py-2 text-sm text-gray-700"
                                    role="menuitem"
                                    tabindex="-1"
                                    id="user-menu-item-0">Your Profile</a>
                                <a href="#"
                                    class="block px-4 py-2 text-sm text-gray-700"
                                    role="menuitem"
                                    tabindex="-1"
                                    id="user-menu-item-1">Settings</a>
                                <div x-data="{ isOpen: false }">
                                    <button x-on:click="isOpen=!isOpen"
                                        class="block px-4 py-2 text-sm text-gray-700"
                                        role="menuitem"
                                        tabindex="-1"
                                        id="user-menu-item-2">Sign out</button>
                                    <template x-teleport="body">
                                        <x-app.logout-dialog />
                                    </template>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </nav>
</div>
