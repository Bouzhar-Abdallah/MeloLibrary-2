@extends('layouts.user')

@section('title', $title)

@section('content')
<div class="p-4">
@foreach ($genres as $genre )
      
      <div class="bg-white py-4 px-4 my-3 sm:px-6  border-2 border-indigo-600">
        <div class="relative  mx-auto divide-y-2 divide-gray-200 ">
          <div class="mb-5">
            <h2 class="text-3xl tracking-tight font-extrabold text-gray-900 sm:text-4xl">{{$genre->name}}</h2>
          </div>
          <ul role="list" class="grid grid-cols-1 gap-6 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4">
            @foreach ($genre->songs as $song)
              
            <livewire:user.song-card id="{{$song->id}}"/>
            @endforeach
            
            <!-- artist songs -->
          </ul>
        </div>
      </div>
      @endforeach


</div>
@endsection