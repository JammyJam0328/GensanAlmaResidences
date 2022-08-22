<div x-data="{ isOpen: $wire.entangle('isOpen') }">
    <x-app.modal showIf="isOpen"
        disableClickAway
        trapNoScroll
        title="View Guest Information">
        <div class="overflow-hidden bg-white sm:rounded-lg">
            @if ($guest)
                <div class="border-t border-gray-200 sm:p-0">
                    <dl class="sm:divide-y sm:divide-gray-200">
                        <div class="py-4 sm:py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                            <dt class="text-sm font-medium text-gray-500">
                                Qr Code
                            </dt>
                            <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                {{ $guest->qr_code }}
                            </dd>
                        </div>
                        <div class="py-4 sm:py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                            <dt class="text-sm font-medium text-gray-500">
                                Name
                            </dt>
                            <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                {{ $guest->name }}
                            </dd>
                        </div>
                        <div class="py-4 sm:py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                            <dt class="text-sm font-medium text-gray-500">
                                Contact Number
                            </dt>
                            <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                {{ $guest->contact_number }}
                            </dd>
                        </div>
                        <div class="py-4 sm:py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                            <dt class="text-sm font-medium text-gray-500">Checked In Room</dt>
                            <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
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
                                                    ROOM # {{ $transaction->check_in_detail->room->number }}
                                                    {{ $transaction->check_in_detail->check_out_at ? '| Checked Out' : '' }}
                                                    | <span class="text-sm">Till:
                                                        {{ date('M d, Y H:m:i', strtotime($transaction->check_in_detail->expected_check_out_at)) }}</span>
                                                </span>
                                            </div>
                                        </li>
                                    @endforeach
                                </ul>
                            </dd>
                        </div>
                        <div class="py-4 sm:py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                            <dt class="text-sm font-medium text-gray-500">Transactions</dt>
                            <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                <ul role="list"
                                    class="border border-gray-200 divide-y divide-gray-200 rounded-md">
                                    @foreach ($guest->transactions as $transaction)
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
                                                    {{ $transaction->transaction_type->name }}
                                                    @switch($transaction->transaction_type_id)
                                                        @case(1)
                                                            | ROOM # {{ $transaction->check_in_detail->room->number }}
                                                            {{ $transaction->check_in_detail->check_out_at ? '| Checked Out' : '' }}
                                                        @break

                                                        @case(2)
                                                            | TV remote and Key
                                                        @break

                                                        @default
                                                    @endswitch
                                                </span>
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
    </x-app.modal>
</div>
