<!DOCTYPE html>
<html class="bg-gray-700"
    lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport"
        content="width=device-width, initial-scale=1">
    <meta name="csrf-token"
        content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="stylesheet"
        href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap">
    <link rel="preconnect"
        href="https://fonts.googleapis.com">
    <link rel="preconnect"
        href="https://fonts.gstatic.com"
        crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;500;700&display=swap"
        rel="stylesheet">
    <!-- Scripts -->
    <style>
        [x-cloak] {
            display: none !important;
        }
    </style>
    @wireUiScripts
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles
</head>

<body x-data
    class="py-10 antialiased font-inter">
    <div x-data="{ action: null }"
        class="px-4 mx-auto max-w-7xl sm:px-6 lg:px-8">
        <div class="max-w-3xl mx-auto">
            <div x-show="action==null"
                class="grid justify-center">
                <h1 class="text-4xl text-white">
                    Welcome to Alma Residences
                </h1>
                <div class="flex justify-center mt-20 space-x-4">
                    <button x-on:click="action='in'"
                        class="p-5 text-4xl text-white uppercase bg-transparent border border-white rounded-lg shadow-2xl ">
                        Check In
                    </button>
                    <button x-on:click="action='out'"
                        class="p-5 text-4xl text-white uppercase bg-transparent border border-white rounded-lg shadow-2xl ">
                        Check In
                    </button>
                </div>
            </div>
            <div x-cloak
                x-show="action=='in'">
                <div class="p-5 border border-white rounded-xl">
                    @livewire('jam.check-in')
                </div>
            </div>
            <div x-cloak
                x-show="action=='out'">
                <div class="p-5 border border-white rounded-xl">

                </div>
            </div>
        </div>
    </div>
    <x-notifications z-index="z-50" />
    <x-dialog z-index="z-50"
        align="center" />
    @livewireScripts
</body>

</html>
