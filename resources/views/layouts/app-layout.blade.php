<!DOCTYPE html>
<html lang="{{ str_replace(" _","_",app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    @if (file_exists(public_path("build/manifest.json")) || file_exists(public_path("hot")))
        @vite(["resources/css/app.css","resources/js/app.js"])
    @endif
</head>

<body class="bg-zinc-900 text-white">
    @include('layouts.navbar')
    @isset($header)
    {{ $header }}
    @endisset
    {{ $slot }}
</body>

</html>