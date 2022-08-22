<div x-data="{ isOpen: $wire.entangle('isOpen') }">
    <x-app.modal showIf="isOpen"
        disableClickAway
        trapNoScroll
        title="Guest To Check In">
        <div class="mt-4 overflow-hidden bg-white">
            <div class="">
                <dl class="grid grid-cols-1 gap-x-4 gap-y-8 sm:grid-cols-2">
                    <div class="sm:col-span-1">
                        <dt class="text-sm font-medium text-gray-500">Qr Code</dt>
                        <dd class="mt-1 text-sm text-gray-900">
                            {{ $guest?->qr_code }}
                        </dd>
                    </div>
                    <div class="sm:col-span-1">
                        <dt class="text-sm font-medium text-gray-500">
                            Full Name
                        </dt>
                        <dd class="mt-1 text-sm text-gray-900">
                            {{ $guest?->name }}
                        </dd>
                    </div>
                    <div class="sm:col-span-1">
                        <dt class="text-sm font-medium text-gray-500">Contact Number</dt>
                        <dd class="mt-1 text-sm text-gray-900">
                            {{ $guest?->contact_number }}
                        </dd>
                    </div>
                    <div class="sm:col-span-2">
                        <dt class="text-sm font-medium text-gray-500">
                            Transactions
                        </dt>
                        <dd class="mt-1 space-y-5 text-sm text-gray-900">
                            @if ($guest)
                                <ul role="list"
                                    class="border border-gray-200 divide-y divide-gray-200 rounded-md">
                                    @foreach ($guest->transactions->where('transaction_type_id', 1) as $transaction)
                                        <li class="flex items-center justify-between py-3 pl-3 pr-4 text-sm">
                                            <div class="flex items-center flex-1 w-0">
                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                    class="flex-shrink-0 w-5 h-5 text-gray-400"
                                                    viewBox="0 0 20 20"
                                                    fill="currentColor">
                                                    <path
                                                        d="M5 4a1 1 0 00-2 0v7.268a2 2 0 000 3.464V16a1 1 0 102 0v-1.268a2 2 0 000-3.464V4zM11 4a1 1 0 10-2 0v1.268a2 2 0 000 3.464V16a1 1 0 102 0V8.732a2 2 0 000-3.464V4zM16 3a1 1 0 011 1v7.268a2 2 0 010 3.464V16a1 1 0 11-2 0v-1.268a2 2 0 010-3.464V4a1 1 0 011-1z" />
                                                </svg>
                                                <span class="flex-1 w-0 ml-2 truncate">
                                                    <span
                                                        class="text-gray-600">{{ $transaction->transaction_type->name }}</span>
                                                    | Room #
                                                    {{ $transaction->check_in_detail->room->number }} |
                                                    {{ $transaction->check_in_detail->rate->type->name }} |
                                                    {{ Str::plural($transaction->check_in_detail->rate->staying_hour->number . ' hour', $transaction->check_in_detail->rate->staying_hour->number) }}
                                                </span>
                                            </div>
                                            <div class="flex-shrink-0 ml-4">
                                                @if ($transaction->paid_at)
                                                    <button wire:click="cancelPayment({{ $transaction->id }})"
                                                        class="font-bold underline text-danger-600 hover:text-danger-500">
                                                        Cancel Payment
                                                    </button>
                                                @else
                                                    <button wire:click="pay({{ $transaction->id }})"
                                                        class="font-bold underline text-primary-600 hover:text-primary-500">
                                                        Pay ₱ {{ $transaction->payable_amount }}
                                                    </button>
                                                @endif
                                            </div>
                                        </li>
                                    @endforeach
                                </ul>
                                <ul role="list"
                                    class="border border-gray-200 divide-y divide-gray-200 rounded-md">
                                    @foreach ($guest->transactions->where('transaction_type_id', 2) as $transaction)
                                        <li class="flex items-center justify-between py-3 pl-3 pr-4 text-sm">
                                            <div class="flex items-center flex-1 w-0">
                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                    class="flex-shrink-0 w-5 h-5 text-gray-400"
                                                    viewBox="0 0 20 20"
                                                    fill="currentColor">
                                                    <path
                                                        d="M5 4a1 1 0 00-2 0v7.268a2 2 0 000 3.464V16a1 1 0 102 0v-1.268a2 2 0 000-3.464V4zM11 4a1 1 0 10-2 0v1.268a2 2 0 000 3.464V16a1 1 0 102 0V8.732a2 2 0 000-3.464V4zM16 3a1 1 0 011 1v7.268a2 2 0 010 3.464V16a1 1 0 11-2 0v-1.268a2 2 0 010-3.464V4a1 1 0 011-1z" />
                                                </svg>
                                                <span class="flex-1 w-0 ml-2 truncate">
                                                    <span
                                                        class="text-gray-600">{{ $transaction->transaction_type->name }}</span>
                                                    | TV remote and Key
                                                </span>
                                            </div>
                                            <div class="flex-shrink-0 ml-4">
                                                @if ($transaction->paid_at)
                                                    <button wire:click="cancelPayment({{ $transaction->id }})"
                                                        class="font-bold underline text-danger-600 hover:text-danger-500">
                                                        Cancel Payment
                                                    </button>
                                                @else
                                                    <button wire:click="pay({{ $transaction->id }})"
                                                        class="font-bold underline text-primary-600 hover:text-primary-500">
                                                        Pay ₱ {{ $transaction->payable_amount }}
                                                    </button>
                                                @endif
                                            </div>
                                        </li>
                                    @endforeach
                                </ul>
                            @endif
                        </dd>
                    </div>
                </dl>
            </div>
        </div>
        <x-slot:actions>
            <x-app.btn-primary wire:click="confirmCheckIn">
                Check in
            </x-app.btn-primary>
        </x-slot:actions>
    </x-app.modal>
</div>
