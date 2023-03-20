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

    @vite('resources/css/app.css')
    @vite('resources/js/app.js')
    @livewireStyles
</head>

<body class="antialiased">
    <div x-data="{
            open:false, 
            name:'abdallah',
            search:'test'
        }">
        <button x-on:click="open = !open" x-bind:class="open ? 'bg-blue-400' : 'bg-red-300'" class="px-5 py-3">click</button>
        <div x-show="open" x-transition>
            <p class="">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Voluptate quisquam ullam totam laudantium minima incidunt similique assumenda ratione accusantium tenetur aliquid saepe magni, non maiores, debitis consequatur. Minus, neque fugit!</p>
            <span class="bg-slate-700 font-bold" x-text="name"></span>
            <div x-effect="console.log(open)"></div>
        </div>
        <input class="border p-2 w-full m-4" placeholder="search" type="text" x-model="search"></input>
        <p>searching for : <span x-text="search"></span></p>
    </div>



</body>
@livewire('livewire-ui-modal')
@livewireScripts

</html>