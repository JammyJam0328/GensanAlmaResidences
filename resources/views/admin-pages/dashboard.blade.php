<x-admin-layout>
    <x-slot:header>
        <x-app.page-title text="Dashboard" />
    </x-slot:header>
    <div class="space-y-5">
        <x-forms.input label="Name" />
        <x-forms.select label="Select" />

        <x-app.btn-default href="#"
            label="Submit" />
    </div>
</x-admin-layout>
