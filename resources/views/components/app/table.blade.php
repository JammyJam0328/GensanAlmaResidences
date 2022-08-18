@props([
    'title' => '',
    'description' => '',
    'actions' => '',
    'noHeader' => false,
    'thead' => '',
    'pagination' => '',
])
<div class="p-5 bg-white border rounded-lg">
    <div class="space-y-5">
        @if ($noHeader == false)
            <div class="sm:flex sm:items-center">
                <div class="sm:flex-auto">
                    <h1 class="text-xl font-semibold text-gray-900">
                        {{ $title }}
                    </h1>
                    <p class="mt-2 text-sm text-gray-700">
                        {{ $description }}
                    </p>
                </div>
            </div>
        @endif
        @if ($actions)
            <div>
                {{ $actions }}
            </div>
        @endif
        <div class="flex flex-col ">
            <div class="-mx-4 -my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                <div class="inline-block min-w-full py-2 align-middle md:px-6 lg:px-8">
                    <div class="overflow-hidden shadow ring-1 ring-black ring-opacity-5 md:rounded-lg">
                        <table class="min-w-full ">
                            <thead class="border-b border-gray-300 bg-gray-50">
                                <tr>
                                    {{ $thead ?? '' }}
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                                {{ $slot }}
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        @if ($pagination)
            <div class="mt-3">
                {{ $pagination }}
            </div>
        @endif
    </div>
</div>
