<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
    <!-- Styles -->
    @livewireStyles
    @vite('resources/css/app.css')
    @vite('resources/js/app.js')
</head>

<body class="antialiased">

    <div x-data="{ open: false }">
        <button @click="open = ! open">Toggle Content</button>

        <div x-show="open">
            Content...
        </div>
    </div>
    <button onclick="Livewire.emit('openModal', 'hello-world')">Open Modal</button>

</body>
@livewire('livewire-ui-modal')
    @livewireScripts
</html>