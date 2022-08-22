<div class="space-y-6">
    <x-filament::card>
        <div x-data
            class="flex-col items-center justify-center w-full py-2">
            <x-forms.input wire:model.debounce.1000ms="qr_code"
                x-ref="qrCodeInput"
                placeholder="Qr Code will appeare here" />
            <div class="flex items-center mt-5 space-x-4">
                <x-app.btn-primary x-on:click="$refs.qrCodeInput.focus()"
                    label="Scan"></x-app.btn-primary>
                <x-app.btn-default wire:click="removeGuest"
                    showLoading
                    label="Clear"></x-app.btn-default>
            </div>
        </div>
    </x-filament::card>
    <x-filament::card>
        <div>
            @if ($store_qr_code)
                <div>
                    @if ($guest)
                        <div>
                            <h3 class="text-lg font-medium leading-6 text-gray-900">Guest Information</h3>
                        </div>
                        <div class="mt-5 border-t border-gray-200">
                            <dl class="divide-y divide-gray-200">
                                <div class="py-4 sm:py-5 sm:grid sm:grid-cols-3 sm:gap-4">
                                    <dt class="text-sm font-medium text-gray-500">QR Code</dt>
                                    <dd class="flex mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                        <span class="flex-grow">
                                            {{ $guest->qr_code }}
                                        </span>
                                    </dd>
                                </div>
                                <div class="py-4 sm:py-5 sm:grid sm:grid-cols-3 sm:gap-4">
                                    <dt class="text-sm font-medium text-gray-500">Full name</dt>
                                    <dd class="flex mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                        <span class="flex-grow">
                                            {{ $guest->name }}
                                        </span>
                                    </dd>
                                </div>
                                <div class="py-4 sm:grid sm:py-5 sm:grid-cols-3 sm:gap-4">
                                    <dt class="text-sm font-medium text-gray-500">
                                        Contact number
                                    </dt>
                                    <dd class="flex mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                        <span class="flex-grow">
                                            {{ $guest->contact_number }}
                                        </span>
                                    </dd>
                                </div>
                                <div class="py-4 sm:grid sm:py-5 sm:grid-cols-3 sm:gap-4">
                                    <dt class="text-sm font-medium text-gray-500">Email address</dt>
                                    <dd class="flex mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                        <span class="flex-grow">margotfoster@example.com</span>
                                    </dd>
                                </div>
                                <div class="py-4 sm:grid sm:py-5 sm:grid-cols-3 sm:gap-4">
                                    <dt class="text-sm font-medium text-gray-500">Salary expectation</dt>
                                    <dd class="flex mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                        <span class="flex-grow"> $120,000</span>
                                    </dd>
                                </div>
                                <div class="py-4 sm:grid sm:py-5 sm:grid-cols-3 sm:gap-4">
                                    <dt class="text-sm font-medium text-gray-500">About</dt>
                                    <dd class="flex mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                        <span class="flex-grow"> Fugiat ipsum ipsum deserunt culpa aute sint do nostrud
                                            anim
                                            incididunt cillum culpa consequat. Excepteur qui ipsum aliquip consequat
                                            sint.
                                            Sit id mollit nulla mollit nostrud in ea officia proident. Irure nostrud
                                            pariatur mollit ad adipisicing reprehenderit deserunt qui eu. </span>
                                    </dd>
                                </div>
                                <div class="py-4 sm:grid sm:py-5 sm:grid-cols-3 sm:gap-4">
                                    <dt class="text-sm font-medium text-gray-500">Attachments</dt>
                                    <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                        <ul role="list"
                                            class="border border-gray-200 divide-y divide-gray-200 rounded-md">
                                            <li class="flex items-center justify-between py-3 pl-3 pr-4 text-sm">
                                                <div class="flex items-center flex-1 w-0">
                                                    <!-- Heroicon name: solid/paper-clip -->
                                                    <svg class="flex-shrink-0 w-5 h-5 text-gray-400"
                                                        xmlns="http://www.w3.org/2000/svg"
                                                        viewBox="0 0 20 20"
                                                        fill="currentColor"
                                                        aria-hidden="true">
                                                        <path fill-rule="evenodd"
                                                            d="M8 4a3 3 0 00-3 3v4a5 5 0 0010 0V7a1 1 0 112 0v4a7 7 0 11-14 0V7a5 5 0 0110 0v4a3 3 0 11-6 0V7a1 1 0 012 0v4a1 1 0 102 0V7a3 3 0 00-3-3z"
                                                            clip-rule="evenodd" />
                                                    </svg>
                                                    <span class="flex-1 w-0 ml-2 truncate">
                                                        resume_back_end_developer.pdf
                                                    </span>
                                                </div>
                                                <div class="flex flex-shrink-0 ml-4 space-x-4">
                                                    <button type="button"
                                                        class="font-medium text-indigo-600 bg-white rounded-md hover:text-indigo-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Update</button>
                                                    <span class="text-gray-300"
                                                        aria-hidden="true">|</span>
                                                    <button type="button"
                                                        class="font-medium text-indigo-600 bg-white rounded-md hover:text-indigo-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Remove</button>
                                                </div>
                                            </li>
                                            <li class="flex items-center justify-between py-3 pl-3 pr-4 text-sm">
                                                <div class="flex items-center flex-1 w-0">
                                                    <!-- Heroicon name: solid/paper-clip -->
                                                    <svg class="flex-shrink-0 w-5 h-5 text-gray-400"
                                                        xmlns="http://www.w3.org/2000/svg"
                                                        viewBox="0 0 20 20"
                                                        fill="currentColor"
                                                        aria-hidden="true">
                                                        <path fill-rule="evenodd"
                                                            d="M8 4a3 3 0 00-3 3v4a5 5 0 0010 0V7a1 1 0 112 0v4a7 7 0 11-14 0V7a5 5 0 0110 0v4a3 3 0 11-6 0V7a1 1 0 012 0v4a1 1 0 102 0V7a3 3 0 00-3-3z"
                                                            clip-rule="evenodd" />
                                                    </svg>
                                                    <span class="flex-1 w-0 ml-2 truncate">
                                                        coverletter_back_end_developer.pdf </span>
                                                </div>
                                                <div class="flex flex-shrink-0 ml-4 space-x-4">
                                                    <button type="button"
                                                        class="font-medium text-indigo-600 bg-white rounded-md hover:text-indigo-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Update</button>
                                                    <span class="text-gray-300"
                                                        aria-hidden="true">|</span>
                                                    <button type="button"
                                                        class="font-medium text-indigo-600 bg-white rounded-md hover:text-indigo-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Remove</button>
                                                </div>
                                            </li>
                                        </ul>
                                    </dd>
                                </div>
                            </dl>
                        </div>
                    @endif
                </div>
            @else
                {{-- scanning placeholder --}}
                <div class="flex items-center justify-center p-10">
                    <div class="flex-col justify-center space-y-3">
                        <svg xmlns="http://www.w3.org/2000/svg"
                            class="w-32 h-32 mx-auto animate-pulse"
                            viewBox="0 0 20 20"
                            fill="currentColor">
                            <path fill-rule="evenodd"
                                d="M3 4a1 1 0 011-1h3a1 1 0 011 1v3a1 1 0 01-1 1H4a1 1 0 01-1-1V4zm2 2V5h1v1H5zM3 13a1 1 0 011-1h3a1 1 0 011 1v3a1 1 0 01-1 1H4a1 1 0 01-1-1v-3zm2 2v-1h1v1H5zM13 3a1 1 0 00-1 1v3a1 1 0 001 1h3a1 1 0 001-1V4a1 1 0 00-1-1h-3zm1 2v1h1V5h-1z"
                                clip-rule="evenodd" />
                            <path
                                d="M11 4a1 1 0 10-2 0v1a1 1 0 002 0V4zM10 7a1 1 0 011 1v1h2a1 1 0 110 2h-3a1 1 0 01-1-1V8a1 1 0 011-1zM16 9a1 1 0 100 2 1 1 0 000-2zM9 13a1 1 0 011-1h1a1 1 0 110 2v2a1 1 0 11-2 0v-3zM7 11a1 1 0 100-2H4a1 1 0 100 2h3zM17 13a1 1 0 01-1 1h-2a1 1 0 110-2h2a1 1 0 011 1zM16 17a1 1 0 100-2h-3a1 1 0 100 2h3z" />
                        </svg>
                        <div wire:loading.remove
                            wire:target="qr_code">
                            <h1>
                                Please scan the QR code to check in
                            </h1>
                        </div>
                    </div>
                </div>
            @endif
            <div wire:loading.flex
                wire:target="qr_code"
                class="flex items-center justify-center space-x-2">
                <x-icons.spinner class="w-8 h-8 fill-primary-700 animate-spin" />
                <h1 class="text-center">
                    Scanning...
                </h1>
            </div>
        </div>
    </x-filament::card>
</div>
