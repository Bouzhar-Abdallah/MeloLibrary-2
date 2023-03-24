@extends('layouts.admin')

@section('title', $title)

@section('content')
<div class="min-h-full">



  <main>
    <div class=" mx-auto  sm:px-6 lg:px-8">
      <x-songs-table :songs="$songs" />
    </div>
  </main>
</div>

@endsection