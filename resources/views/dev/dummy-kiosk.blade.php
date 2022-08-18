<x-app>
    <div x-data="kiosk"
        class="w-full max-w-4xl mx-auto my-20">
        <div class="grid justify-center grid-cols-2 gap-4">
            <template x-for="(type,index) in types"
                :key="index">
                <button x-on:click="setActiveModal(type.id)"
                    class="p-10 border shadow-md focus:bg-primary-700 focus:text-white border-primary-700 rounded-xl">
                    <span x-text="type.name"></span>
                </button>
            </template>
            <template x-for="(type,index) in types"
                :key="index">
                <div x-cloak
                    x-show="activeModal == type.id"
                    class="relative z-10"
                    aria-labelledby="modal-title"
                    role="dialog"
                    aria-modal="true">
                    <div class="fixed inset-0 transition-opacity bg-gray-500 bg-opacity-75"></div>
                    <div class="fixed inset-0 z-10 overflow-y-auto">
                        <div class="flex items-end justify-center min-h-full p-4 text-center sm:items-center sm:p-0">
                            <div x-on:click.away="setActiveModal(null)"
                                class="relative px-4 pt-5 pb-4 overflow-hidden text-left transition-all transform bg-white rounded-lg shadow-xl sm:my-8 sm:max-w-5xl sm:w-full sm:p-6">
                                <div>
                                    <div class="mt-3 text-center sm:mt-5">
                                        <fieldset>
                                            <legend class="text-lg font-medium text-gray-900">Available Rooms</legend>
                                            <div
                                                class="mt-4 border-t border-b border-gray-200 divide-y divide-gray-200">
                                                <template x-for="(room,index) in type.rooms"
                                                    :key="index">
                                                    <div class="relative flex items-start py-4">
                                                        <div class="flex-1 min-w-0 text-sm">
                                                            <label for="person-1"
                                                                class="font-medium text-gray-700 select-none"
                                                                x-text="'Room #'+room.number"></label>
                                                        </div>
                                                        <div class="flex items-center h-5 ml-3">
                                                            <input :id="room.id"
                                                                :name="room.id"
                                                                type="checkbox"
                                                                class="w-4 h-4 text-indigo-600 border-gray-300 rounded focus:ring-indigo-500">
                                                        </div>
                                                    </div>
                                                </template>
                                            </div>
                                        </fieldset>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </template>
        </div>
    </div>
    <script>
        document.addEventListener('alpine:init', () => {
            Alpine.data('kiosk', () => ({
                activeModal: null,
                tab: null,
                types: @js($types),
                selectedRooms: [],
                setActiveModal(modalId) {
                    this.activeModal = modalId;
                },
            }))
        })
    </script>
</x-app>
