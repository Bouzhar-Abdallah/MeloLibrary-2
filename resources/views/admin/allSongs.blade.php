@extends('layouts.admin')

@section('title', $title)

@section('content')
<div class="min-h-full">



  <main>
    <div class=" mx-auto  sm:px-6 lg:px-8">
      
      <livewire:admin-songs-table />
    </div>
  </main>
</div>

@endsection