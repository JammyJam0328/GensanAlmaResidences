<div class="flex items-center space-x-3">
    <button
        class="relative text-primary-600 hover:text-primary-700 before:absolute before:h-3 before:w-3 before:rounded-full before:bg-red-600 before:right-0 before:top-0 before:z-40">
        <x-icons.bell class="relative h-7 " />
    </button>
    <button
        class="relative text-primary-600 hover:text-primary-700 before:absolute before:h-3 before:w-3 before:rounded-full before:bg-red-600 before:right-0 before:top-0 before:z-40">
        <svg xmlns="http://www.w3.org/2000/svg"
            class="w-7 h-7"
            fill="none"
            viewBox="0 0 24 24"
            stroke="currentColor"
            stroke-width="2">
            <path stroke-linecap="round"
                stroke-linejoin="round"
                d="M17 8h2a2 2 0 012 2v6a2 2 0 01-2 2h-2v4l-4-4H9a1.994 1.994 0 01-1.414-.586m0 0L11 14h4a2 2 0 002-2V6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2v4l.586-.586z" />
        </svg>
    </button>
    <button class="text-primary-600 hover:text-primary-700">
        <x-icons.user class=" h-7" />
    </button>
    <div x-data="{ isOpen: false }"
        class="mt-1.5">
        <button x-on:click="isOpen = true"
            class="text-primary-600 hover:text-primary-700">
            <x-icons.logout class=" h-7" />
        </button>
        <template x-teleport="body">
            <x-app.logout-dialog />
        </template>
    </div>
</div>
