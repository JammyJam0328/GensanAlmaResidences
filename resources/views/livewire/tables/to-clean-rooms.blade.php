<div>
    <div class="">
        <div class="p-2 mb-2 space-y-1 bg-white border rounded-lg">
            <h1>Name : {{ auth()->user()->name }} </h1>
            <h1>Floor : {{ ordinal($this->designation->floor->number) }} Floor </h1>
        </div>
    </div>
    <ul role="list"
        class="grid grid-cols-1 gap-6 sm:grid-cols-4 lg:grid-cols-4">
        @forelse ($rooms as $room)
            <li class="col-span-1 bg-white border divide-y divide-gray-200 rounded-lg shadow border-primary-700">
                <div class="flex items-center justify-between w-full p-3 space-x-6">
                    <div class="flex-1 truncate">
                        <div class="flex items-center space-x-3">
                            <h3 class="text-sm font-medium text-gray-900 truncate">
                                Room # {{ $room->number }}
                            </h3>
                        </div>
                        @php
                            $timeToClean = new Carbon\Carbon($room->time_to_clean);
                        @endphp
                        <x-countdown :expires="$timeToClean" />
                    </div>
                </div>
                <div>
                    <div class="flex -mt-px divide-x divide-gray-200">
                        <div class="flex flex-1 w-0 -ml-px">
                            <button href="#"
                                class="relative inline-flex items-center justify-center flex-1 w-0 py-4 text-sm font-medium text-gray-700 border border-transparent rounded-br-lg hover:text-gray-500">
                                <span class="ml-3">
                                    Start
                                </span>
                            </button>
                        </div>
                    </div>
                </div>
            </li>
        @empty
        @endforelse
    </ul>

</div>
