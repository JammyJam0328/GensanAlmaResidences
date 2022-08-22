<div>
    <x-filament::card>
        <h1 class="text-lg font-semibold text-center">
            Recent Check-In
        </h1>
    </x-filament::card>
    <ul class="mt-3 space-y-3 ">
        @forelse ($guests as $guest)
            <li class="px-3 py-2 bg-white rounded-lg shadow">
                <div class="w-full text-lg">
                    {{ $guest->name }}
                </div>
                <div class="w-full text-gray-600">
                    {{ $guest->qr_code }}
                </div>
            </li>
        @empty
            <li class="px-3 py-2 bg-white rounded-lg shadow">
                <div class="w-full text-center">
                    <p class="text-lg font-medium text-gray-700">
                        No guest found
                    </p>
                </div>
            </li>
        @endforelse

    </ul>
</div>
