@props(['htmlClass' => '', 'bodyClass' => '', 'title' => ''])
<!DOCTYPE html>
<html class="{{ $htmlClass }}"
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

    <!-- Styles -->
    @livewireStyles
</head>

<body x-data
    class="antialiased font-inter {{ $bodyClass }}">
    {{ $slot }}
    @livewire('notifications')
    @livewire('app.confirm-dialog')
    <x-notifications z-index="z-50" />
    <x-dialog z-index="z-50"
        align="center" />
    @livewireScripts
</body>

</html>
