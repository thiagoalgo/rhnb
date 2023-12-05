<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        [x-cloak] {
            display: none;
        }
    </style>

    <tallstackui:script />
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <title>RH Nada Básico
        @if (isset($title))
            - {{ $title }}
        @endif
    </title>
</head>

<body class="bg-slate-100">
    <x-toast />
    <div class="flex flex-row min-h-screen bg-gray-100 text-gray-800">

        @livewire('app.sidebar')

        <main class="main flex flex-col flex-grow -ml-64 md:ml-0 transition-all duration-150 ease-in">

            @livewire('app.header')

            <div class="main-content flex flex-col flex-grow p-4">
                {{ $slot }}
            </div>

            @livewire('app.footer')

        </main>
    </div>

</body>

</html>
