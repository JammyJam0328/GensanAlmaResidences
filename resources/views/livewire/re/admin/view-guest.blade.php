<div class="mt-5">
    <div>
        @if ($guest != null)
            <div class="rounded-lg border border-gray-200 shadow">
                <x-card shadow="shadow-none"
                    title="View Guest Details">
                    <div class="overflow-hidden ">
                        <div>
                            <dl class="grid grid-cols-1 gap-x-4 gap-y-8 sm:grid-cols-2">
                                <div class="sm:col-span-1">
                                    <dt class="text-sm font-medium text-gray-500">QR CODE</dt>
                                    <dd class="mt-1 text-sm text-gray-900">{{ $guest->qr_code }}</dd>
                                </div>
                                <div class="sm:col-span-1">
                                    <dt class="text-sm font-medium text-gray-500">Name</dt>
                                    <dd class="mt-1 text-sm text-gray-900"> {{ $guest->name }} </dd>
                                </div>
                                <div class="sm:col-span-1">
                                    <dt class="text-sm font-medium text-gray-500"> Contact Number </dt>
                                    <dd class="mt-1 text-sm text-gray-900">
                                        {{ $guest->contact_number }}
                                    </dd>
                                </div>
                                <div class="sm:col-span-1">
                                    <dt class="text-sm font-medium text-gray-500"> Check In At</dt>
                                    <dd class="mt-1 text-sm text-gray-900">{{ $guest->check_in_at }} </dd>
                                </div>
                                <div class="sm:col-span-2">
                                    <dt class="text-sm font-medium text-gray-500">Checked In Room(S)</dt>
                                    <dd class="mt-1 px-1 text-sm text-gray-900">
                                        <ul role="list"
                                            class="divide-y divide-gray-200 rounded-md shadow-sm border border-gray-200">
                                            @foreach ($transactions->where('transaction_type_id', 1) as $transaction)
                                                <li class="flex items-center justify-between py-3 pl-3 pr-4 text-sm ">
                                                    <div class="flex w-0 flex-1 items-center">
                                                        <svg xmlns="http://www.w3.org/2000/svg"
                                                            fill="none"
                                                            viewBox="0 0 24 24"
                                                            stroke-width="1.5"
                                                            stroke="currentColor"
                                                            class="h-5 w-5 flex-shrink-0 text-gray-400">
                                                            <path stroke-linecap="round"
                                                                stroke-linejoin="round"
                                                                d="M15.75 5.25a3 3 0 013 3m3 0a6 6 0 01-7.029 5.912c-.563-.097-1.159.026-1.563.43L10.5 17.25H8.25v2.25H6v2.25H2.25v-2.818c0-.597.237-1.17.659-1.591l6.499-6.499c.404-.404.527-1 .43-1.563A6 6 0 1121.75 8.25z" />
                                                        </svg>
                                                        <span class="ml-2 w-0 flex-1 truncate">
                                                            Room # {{ $transaction->check_in_detail->room->number }}
                                                        </span>
                                                    </div>
                                                    <div class="ml-4 flex-shrink-0">
                                                        @if ($transaction->check_in_detail->check_out_at)
                                                            Checked Out
                                                        @else
                                                            @php
                                                                $expires_at = new Carbon\Carbon($transaction->check_in_detail->expected_check_out_at);
                                                            @endphp
                                                            <div class="flex space-x-2">
                                                                <h1 class="text-gray-500">
                                                                    Remaining :
                                                                </h1>
                                                                <x-countdown :expires="$expires_at" />
                                                            </div>
                                                        @endif
                                                    </div>
                                                </li>
                                            @endforeach
                                        </ul>
                                    </dd>
                                </div>
                                <div class="sm:col-span-2">
                                    <dt class="text-sm font-medium text-gray-500">Transactions</dt>
                                    <dd class="mt-1 text-sm text-gray-900">
                                        <div class="p-2">
                                            <div class=" flex flex-col">
                                                <div class="-my-2 -mx-4 overflow-x-auto sm:-mx-6 lg:-mx-8">
                                                    <div
                                                        class="inline-block min-w-full py-2 align-middle md:px-6 lg:px-8">
                                                        <div
                                                            class="overflow-hidden shadow ring-1 ring-black ring-opacity-5 md:rounded-lg">
                                                            <table class="min-w-full divide-y divide-gray-300">
                                                                <thead class="bg-gray-50">
                                                                    <tr>
                                                                        <th scope="col"
                                                                            class="py-3 pl-4 pr-3 text-left text-xs font-medium uppercase tracking-wide text-gray-500 sm:pl-6">
                                                                            Transaction Type
                                                                        </th>
                                                                        <th scope="col"
                                                                            class="px-3 py-3 text-left text-xs font-medium uppercase tracking-wide text-gray-500">
                                                                            Amount
                                                                        </th>
                                                                        <th scope="col"
                                                                            class="px-3 py-3 text-left text-xs font-medium uppercase tracking-wide text-gray-500">
                                                                            Paid At
                                                                        </th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody class="divide-y divide-gray-200 bg-white">
                                                                    @foreach ($transactions as $transaction)
                                                                        <tr>
                                                                            <td
                                                                                class="whitespace-nowrap py-4 pl-4 pr-3 text-sm font-medium text-gray-900 sm:pl-6">
                                                                                {{ $transaction->transaction_type->name }}
                                                                            </td>
                                                                            <td
                                                                                class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
                                                                                ₱ {{ $transaction->payable_amount }}
                                                                            </td>
                                                                            <td
                                                                                class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
                                                                                {{ $transaction->paid_at ?? '-' }}
                                                                            </td>

                                                                        </tr>
                                                                    @endforeach
                                                                    <tr>
                                                                        <td
                                                                            class="whitespace-nowrap py-4 pl-4 pr-3 text-sm font-medium text-gray-900 sm:pl-6">
                                                                            Total
                                                                        </td>
                                                                        <td
                                                                            class="whitespace-nowrap px-3 py-4 text-sm text-gray-500 font-bold underline">
                                                                            ₱ {{ $transactions->sum('payable_amount') }}
                                                                        </td>
                                                                        <td
                                                                            class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
                                                                            -
                                                                        </td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </dd>
                                </div>
                            </dl>
                        </div>
                    </div>
                    <x-slot:action>
                        <x-button x-on:click="view=false"
                            negative
                            xs
                            icon="x" />
                    </x-slot:action>
                </x-card>
            </div>
        @endif
    </div>
</div>
