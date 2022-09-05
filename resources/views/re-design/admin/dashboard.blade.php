@extends('layouts.admin')
@section('title', 'Dashboard')
@section('content')
    <div class="space-y-5">
        <x-admin.statlist>
            <x-admin.statlist-item label="Check in today"
                value="100">
                <x-slot:icon>
                    <x-illustrations.check-in class="h-24 -mr-6" />
                </x-slot:icon>
            </x-admin.statlist-item>
            <x-admin.statlist-item label="In House"
                value="100">
                <x-slot:icon>
                    <x-illustrations.in-house class="h-24 " />
                </x-slot:icon>
            </x-admin.statlist-item>
        </x-admin.statlist>
        <div>
            @php
                $rooms = \App\Models\Room::where('room_status_id', 2)
                    ->with([
                        'check_in_details' => function ($query) {
                            $query->where('check_out_at', null);
                        },
                    ])
                    ->get();
            @endphp
            <div>
                <div class="mt-10 flex flex-col">
                    <div>
                        <h1 class="uppercase text-gray-500">
                            Rooms monitoring
                        </h1>
                    </div>
                    <div class="-my-2 -mx-4 overflow-x-auto sm:-mx-6 lg:-mx-8">
                        <div class="inline-block min-w-full py-2 align-middle md:px-6 lg:px-8">
                            <div class="overflow-hidden shadow ring-1 ring-black ring-opacity-5 md:rounded-lg">
                                <table class="min-w-full divide-y divide-gray-300">
                                    <tbody class="divide-y divide-gray-200 bg-white">
                                        @forelse ($rooms as $room)
                                            <tr>
                                                <td
                                                    class="whitespace-nowrap py-4 pl-4 pr-3 text-sm font-medium text-gray-900 sm:pl-6">
                                                    ROOM # {{ $room->number }}
                                                </td>
                                                <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
                                                    <div x-data="{ timeIsUp: false }"
                                                        class="flex justify-end">
                                                        @php
                                                            $expires_at = new Carbon\Carbon($room->check_in_details->first()->expected_check_out_at);
                                                        @endphp
                                                        <x-countdown :expires="$expires_at" />
                                                        <x-app.alarm :expires="$expires_at->subHours(1)" />
                                                    </div>
                                                </td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="5"
                                                    class="whitespace-nowrap py-4 pl-4 pr-3 text-sm font-medium text-gray-900 sm:pl-6">
                                                    No rooms are occupied
                                                </td>
                                            </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

@endsection
