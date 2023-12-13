<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<!-- https://preline.co/examples/html/application-layout-sidebar-and-header.html -->

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        [x-cloak] {
            display: none;
        }
    </style>

    <tallstackui:script />
    @vite([
        'resources/css/app.css',
        'resources/css/hs.theme-appearance.css',
        'resources/js/app.js',
    ])

    <title>RH Nada Básico
        @if (isset($title))
            - {{ $title }}
        @endif
    </title>

    
</head>

<body class="bg-gray-50 dark:bg-slate-900">
    @vite(['resources/js/hs.theme-appearance.js',])

    <x-toast />
    <x-dialog />

    <!-- ========== HEADER ========== -->
    @livewire('app.header')
    <!-- ========== END HEADER ========== -->

    <!-- ========== MAIN CONTENT ========== -->
    @livewire('app.sidebar')

    <!-- Content -->
    <div class="w-full pt-6 px-4 sm:px-6 md:px-8 lg:ps-72">
        @livewire('app.alert.Alert')
        
        {{ $slot }}

        @livewire('app.footer')
    </div>
    <!-- End Content -->
    <!-- ========== END MAIN CONTENT ========== -->

    <!-- JS Implementing Plugins -->

    <!-- JS PLUGINS -->
    <!-- Required plugins -->
    @vite(['resources/js/hs.theme-plugin.js',])
</body>

</html>
