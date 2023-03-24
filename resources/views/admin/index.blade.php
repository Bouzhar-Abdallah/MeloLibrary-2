@extends('layouts.admin')

@section('title', $title)

@section('content')
<div class="min-h-full">



  <main>
    <div class="mx-5 mt-2">


      <livewire:components.feedbacks />
     
    </div>
    <div class="max-w-7xl mx-auto py-6 sm:px-6 lg:px-8">
      <!-- stats -->


      <x-stats />
      <!-- lists -->
      <!-- <button onclick="Livewire.emit('openModal', 'feedback-modal')">Open Modal</button> -->
      <dl class="mt-5 border border-gray-300 grid grid-cols-1 rounded-lg bg-white overflow-hidden shadow divide-y divide-gray-200 lg:grid-cols-3 md:grid-cols-2 md:divide-y-0 md:divide-x">
        <livewire:components.search name="artist" />
        <livewire:components.search name="band" />
        <livewire:components.search name="genre" />


      </dl>
      <div>

      </div>


      <!-- /End replace -->
    </div>
  </main>
</div>

@endsection