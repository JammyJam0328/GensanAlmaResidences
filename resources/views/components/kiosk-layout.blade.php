<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="h-full">

<head>
    <meta charset="utf-8">
    <meta name="viewport"
        content="width=device-width, initial-scale=1">
    <meta name="csrf-token"
        content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">
        <link href="https://fonts.googleapis.com/css2?family=Rubik:wght@300;600;700&display=swap" rel="stylesheet">
    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- Styles -->
    @livewireStyles
</head>

<body class="font-sans antialiased h-full bg-gray-700">
<div class="absolute bg-gradient-to-t from-transparent to-gray-500 w-full h-full overflow-hidden">
  <img src="{{asset('images/kioskbg.jpg')}}" class="object-cover opacity-20" alt="">
</div>
<div class="absolute text-gray-300 flex justify-end items-end pb-5 pr-5 text-sm font-rubik font-medium w-full h-full">POWERED BY: J7 I.T SOLUTION</div>
<div class="relative">
    <div class="flex justify-between  p-4 px-10">
        <x-svg.logo class="h-16" />
         <form method="POST" action="{{ route('logout') }}" role="none">
            @csrf
            <a href="{{ route('logout') }}" onclick="event.preventDefault();
            this.closest('form').submit();" class="hover:fill-white fill-gray-300">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="h-8 w-8 ">
                    <path fill="none" d="M0 0h24v24H0z" />
                    <path
                        d="M5 2h14a1 1 0 0 1 1 1v18a1 1 0 0 1-1 1H5a1 1 0 0 1-1-1V3a1 1 0 0 1 1-1zm4 9V8l-5 4 5 4v-3h6v-2H9z" />
                </svg>
            </a>
         </form>
     </div>
    {{$slot}}
</div>
    {{-- <x-jet-banner />

    <div class="min-h-screen bg-gray-100">
        @livewire('navigation-menu')

        <!-- Page Heading -->
        @if (isset($header))
            <header class="bg-white shadow">
                <div class="px-4 py-6 mx-auto max-w-7xl sm:px-6 lg:px-8">
                    {{ $header }}
                </div>
            </header>
        @endif

        <!-- Page Content -->
        <main>
            {{ $slot }}
        </main>
    </div>

    @stack('modals') --}}
    
    @livewireScripts
</body>

</html>
