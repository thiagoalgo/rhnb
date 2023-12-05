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

    <title>{{ $title ?? 'Page Title' }}</title>
</head>

<body class="bg-logorhnb">
    <x-toast />
    {{ $slot }}
</body>

</html>
