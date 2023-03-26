@extends('layouts.user')

@section('title', $title)

@section('content')
<div class="p-4">
    <!-- This example requires Tailwind CSS v2.0+ -->
    <ul role="list" class="grid grid-cols-1 gap-6 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4">

        <livewire:user.song-card id="2"/>
        <livewire:user.song-card id="3"/>
        <livewire:user.song-card id="4"/>
        <livewire:user.song-card id="5"/>
        
    </ul>


</div>
@endsection