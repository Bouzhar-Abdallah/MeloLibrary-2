<x-app-layout>
  <!-- This example requires Tailwind CSS v2.0+ -->
  <!--
  This example requires updating your template:

  ```
  <html class="h-full bg-gray-100">
  <body class="h-full">
  ```
-->
  <div class="min-h-full">


    
    <main>
      <div class="mx-5 mt-2">

        
        <livewire:components.feedbacks />
        @auth
          
        {{Auth::user()->role->name}}
        @endauth
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
<!--   <script>
    function showEditModal(id='', name='') {
        var payload = {
            id: id,
            name: name
        };
        window.livewire.emitTo('edit-modal', 'show', payload);
    }
   
</script> -->
</x-app-layout>