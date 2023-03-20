<!DOCTYPE html>
<!-- <html lang="{{ str_replace('_', '-', app()->getLocale()) }}"> -->
@vite(['resources/css/app.css','resources/js/app.js'])

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Melolib</title>

</head>

<body class="antialiased">
<x-navigation />
@include('flash-message')

<x-pro/>
    
</body>

</html>