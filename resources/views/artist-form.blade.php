<!--
  This example requires Tailwind CSS v2.0+ 
  
  This example requires some changes to your config:
  
  ```
  // tailwind.config.js
  module.exports = {
    // ...
    plugins: [
      // ...
      require('@tailwindcss/forms'),
    ],
  }
  ```
-->
<x-app-layout>
  
  <!-- Email Address -->
  <form class="w-1/2 mx-auto" action="{{ route('save.new.artist', ['id' => $artist->id]) }}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="mt-4">
      <x-input-label for="name" :value="__('name')" />
      <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="$artist->name" required autocomplete="username" />
      <x-input-error :messages="$errors->get('name')" class="mt-2" />
    </div>

    <div class="mt-4">
      <x-input-label for="country" :value="__('country')" />
      <x-text-input id="country" class="block mt-1 w-full" type="text" name="country" :value="$artist->country" required autocomplete="username" />
      <x-input-error :messages="$errors->get('country')" class="mt-2" />
    </div>
    <div class="mt-4">
      <x-input-label for="date_of_birth" :value="__('date_of_birth')" />
      <x-text-input id="date_of_birth" class="block mt-1 w-full" type="date" name="date_of_birth" :value="$artist->date_of_birth" required autocomplete="username" />
      <x-input-error :messages="$errors->get('date_of_birth')" class="mt-2" />
    </div>
    <div class="mt-4 flex gap-5">
      <div class="h-12 w-12 ">
        <img src="{{ $artist->cover_url }}" alt="">
      </div>
      <div class="">
        <input type="file" name="cover" id="">
        <x-input-error :messages="$errors->get('cover')" class="mt-2" />
      </div>
    </div>
    <div class="mt-5 mx-auto">
      <button class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800" role="submit">Save</button>
    </div>
  </form>
</x-app-layout>