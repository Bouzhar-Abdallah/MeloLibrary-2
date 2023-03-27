<x-header />
<livewire:components.flash-messages />
<div class="min-h-screen bg-gray-100">

  <body class="font-sans antialiased h-full overflow-hidden">


    <div class="h-screen flex">
      <!-- Narrow sidebar -->
      <x-user.sidebar />

      <!-- Content area -->
      <div class="flex-1 flex flex-col overflow-hidden">
        
<livewire:user.search-bar />
        <!-- Main content -->
        <div class="flex-1 flex items-stretch overflow-hidden">
          <main class="flex-1 overflow-y-auto ">
            <!-- Primary column -->
            <section aria-labelledby="primary-heading" class="min-w-full bg-indigo-300 flex-1 h-full flex flex-col lg:order-last">

              @yield('content')

            </section>
          </main>
          <div id="drawer-navigation" class="fixed top-0 left-0 z-40 w-96 h-screen  overflow-y-auto transition-transform -translate-x-full bg-white dark:bg-gray-800" tabindex="-1" aria-labelledby="drawer-navigation-label">
            <div class="my-2">

              <h5 id="drawer-navigation-label" class="text-base mt-4 ml-2 font-semibold text-gray-500 uppercase dark:text-gray-400">Media player</h5>
              <button type="button" data-drawer-hide="drawer-navigation" aria-controls="drawer-navigation" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 absolute top-2.5 right-2.5 inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white">
                <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                  <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                </svg>
                <span class="sr-only">Close menu</span>
              </button>
            </div>

            

            <aside class="py-4 overflow-y-auto">

              <livewire:user.aside />
              <x-user.newplaylistform />
            </aside>

          </div>
        </div>
      </div>
    </div>


</div>
</body>
<x-footer />