<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    {{-- My Style --}}
    @vite('resources/css/app.css')

    {{-- Font --}}
    {{-- Sarabun --}}
    <link rel="preconnect" href="https://fonts.googleapis.com"><link rel="preconnect" href="https://fonts.gstatic.com" crossorigin><link href="https://fonts.googleapis.com/css2?family=Sarabun:wght@400;500;600;700&display=swap" rel="stylesheet">
    {{-- Zen Kureneido --}}
    <link rel="preconnect" href="https://fonts.googleapis.com"><link rel="preconnect" href="https://fonts.gstatic.com" crossorigin><link href="https://fonts.googleapis.com/css2?family=Sarabun:wght@400;500;600;700&family=Zen+Kurenaido&display=swap" rel="stylesheet">

    <title>Dashboard | {{ $title }}</title>

    {{-- Trix editor --}}
    {{-- <link rel="stylesheet" type="text/css" href="/css/trix.css">
    <script type="text/javascript" src="/js/trix.js"></script> --}}

    {{-- <style>
        trix-toolbar [data-trix-button-group="file-tools"] {
            display: none;
        }
    </style> --}}
</head>

<body>

    @include('dashboard.layouts.header')

    @yield('container')

    {{-- <script src="/js/dashboard.js"></script> --}}
</body>

</html>
