<div>
    <x-modal.card title="CHECK IN"
        max-width="4xl"
        wire:model.defer="modalOpen">
        <div>
            @if ($guest)
                <div>
                    <dl class="sm:divide-y sm:divide-gray-200">
                        <div class="py-2 sm:grid sm:grid-cols-3 sm:gap-4 sm:py-2">
                            <dt class="text-sm font-medium text-gray-500">QR Code</dt>
                            <dd class="mt-1 text-sm text-gray-900 sm:col-span-2 sm:mt-0">
                                {{ $guest->qr_code }}
                            </dd>
                        </div>
                        <div class="py-2 sm:grid sm:grid-cols-3 sm:gap-4 sm:py-2">
                            <dt class="text-sm font-medium text-gray-500">Name</dt>
                            <dd class="mt-1 text-sm text-gray-900 sm:col-span-2 sm:mt-0">
                                {{ $guest->name }}
                            </dd>
                        </div>
                        <div class="py-2 sm:grid sm:grid-cols-3 sm:gap-4 sm:py-2">
                            <dt class="text-sm font-medium text-gray-500">
                                Contact Number
                            </dt>
                            <dd class="mt-1 text-sm text-gray-900 sm:col-span-2 sm:mt-0">
                                {{ $guest->contact_number }}
                            </dd>
                        </div>
                        <div class="py-2 sm:grid sm:grid-cols-3 sm:gap-4 sm:py-2">
                            <dt class="text-sm font-medium text-gray-500">Transaction | Bills</dt>
                            <dd class="mt-1 text-sm text-gray-900 sm:col-span-3 sm:mt-0">
                                <ul role="list"
                                    class="divide-y divide-gray-200 rounded-md border border-gray-200">
                                    @foreach ($transactions as $transaction)
                                        <li class="flex items-center justify-between py-3 pl-3 pr-4 text-sm">
                                            <div class="flex w-0 flex-1 items-center">
                                                <span class="ml-2 w-0 flex-1 truncate">
                                                    {{ $transaction->transaction_type->name }} |
                                                    ₱{{ $transaction->payable_amount }} @if ($transaction->transaction_type_id == 1)
                                                        | ROOM # {{ $transaction->check_in_detail->room->number }}
                                                    @endif
                                                </span>
                                            </div>
                                            <div class="ml-4 flex-shrink-0">
                                                @if ($transaction->paid_at)
                                                    <button type="button"
                                                        wire:click="cancelPayment({{ $transaction->id }})"
                                                        class="font-medium text-danger-600 hover:text-danger-500 flex space-x-2 items-center">
                                                        <svg xmlns="http://www.w3.org/2000/svg"
                                                            fill="none"
                                                            viewBox="0 0 24 24"
                                                            stroke-width="1.5"
                                                            stroke="currentColor"
                                                            class="w-6 h-6">
                                                            <path stroke-linecap="round"
                                                                stroke-linejoin="round"
                                                                d="M9.75 9.75l4.5 4.5m0-4.5l-4.5 4.5M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                                        </svg>

                                                        <span>
                                                            Cancel Payment
                                                        </span>
                                                    </button>
                                                @else
                                                    <button type="button"
                                                        wire:click="pay({{ $transaction->id }})"
                                                        class="font-medium text-green-600 hover:text-green-500 flex space-x-2 items-center">
                                                        <svg xmlns="http://www.w3.org/2000/svg"
                                                            fill="none"
                                                            viewBox="0 0 24 24"
                                                            stroke-width="1.5"
                                                            stroke="currentColor"
                                                            class="w-6 h-6">
                                                            <path stroke-linecap="round"
                                                                stroke-linejoin="round"
                                                                d="M2.25 18.75a60.07 60.07 0 0115.797 2.101c.727.198 1.453-.342 1.453-1.096V18.75M3.75 4.5v.75A.75.75 0 013 6h-.75m0 0v-.375c0-.621.504-1.125 1.125-1.125H20.25M2.25 6v9m18-10.5v.75c0 .414.336.75.75.75h.75m-1.5-1.5h.375c.621 0 1.125.504 1.125 1.125v9.75c0 .621-.504 1.125-1.125 1.125h-.375m1.5-1.5H21a.75.75 0 00-.75.75v.75m0 0H3.75m0 0h-.375a1.125 1.125 0 01-1.125-1.125V15m1.5 1.5v-.75A.75.75 0 003 15h-.75M15 10.5a3 3 0 11-6 0 3 3 0 016 0zm3 0h.008v.008H18V10.5zm-12 0h.008v.008H6V10.5z" />
                                                        </svg>
                                                        <span> Pay</span>
                                                    </button>
                                                @endif
                                            </div>
                                        </li>
                                    @endforeach
                                </ul>
                            </dd>
                        </div>
                    </dl>
                </div>
            @endif
        </div>
        <x-slot:footer>
            <x-button wire:click="confirmCheckIn"
                primary
                spinner="confirmCheckIn">
                Check In
            </x-button>
        </x-slot:footer>
    </x-modal.card>
</div>
