<div class="flex items-center space-x-3">
    <button
        class="relative text-primary-600 hover:text-primary-700 before:absolute before:h-3 before:w-3 before:rounded-full before:bg-red-600 before:right-0 before:top-0 before:z-40">
        <x-icons.bell class="relative h-7 " />
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
