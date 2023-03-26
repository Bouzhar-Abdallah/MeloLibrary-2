<x-header />
<livewire:components.flash-messages />
<div class="min-h-screen bg-gray-100">

  <body class="font-sans antialiased h-full overflow-hidden">


    <div class="h-screen flex">
      <!-- Narrow sidebar -->
      <x-user.sidebar />

      <!-- Content area -->
      <div class="flex-1 flex flex-col overflow-hidden">
        <header class="w-full">
          <div class="relative z-10 flex-shrink-0 h-16 bg-white border-b border-gray-200 shadow-sm flex">

            <button data-drawer-target="drawer-navigation-sidebar" data-drawer-show="drawer-navigation-sidebar" aria-controls="drawer-navigation-sidebar" type="button" class="border-r border-gray-200 px-4 text-gray-500 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-indigo-500 md:hidden">
              <span class="sr-only">Open sidebar</span>
              <!-- Heroicon name: outline/menu-alt-2 -->
              <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h7" />
              </svg>
            </button>
            <div class="flex-1 flex justify-between px-4 sm:px-6">
              <div class="flex-1 flex">
                <form class="w-full flex md:ml-0" action="#" method="GET">
                  <label for="search-field" class="sr-only">Search all files</label>
                  <div class="relative w-full text-gray-400 focus-within:text-gray-600">
                    <div class="pointer-events-none absolute inset-y-0 left-0 flex items-center">
                      <!-- Heroicon name: solid/search -->
                      <svg class="flex-shrink-0 h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                        <path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd" />
                      </svg>
                    </div>
                    <input name="search-field" id="search-field" class="h-full w-full border-transparent py-2 pl-8 pr-3 text-base text-gray-900 placeholder-gray-500 focus:outline-none focus:ring-0 focus:border-transparent focus:placeholder-gray-400" placeholder="Search" type="search">
                  </div>
                </form>
              </div>
              <div class="ml-2 flex items-center space-x-4 sm:ml-6 sm:space-x-6">
                <!-- Profile dropdown -->
                <div class="relative flex-shrink-0">
                  <div>
                    <button type="button" class="bg-white rounded-full flex text-sm focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" id="user-menu-button" aria-expanded="false" aria-haspopup="true">
                      <span class="sr-only">Open user menu</span>
                      <img class="h-8 w-8 rounded-full" src="https://images.unsplash.com/photo-1517365830460-955ce3ccd263?ixlib=rb-=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=8&w=256&h=256&q=80" alt="">
                    </button>
                  </div>

                
                  <div class="hidden origin-top-right absolute right-0 mt-2 w-48 rounded-md shadow-lg py-1 bg-white ring-1 ring-black ring-opacity-5 focus:outline-none" role="menu" aria-orientation="vertical" aria-labelledby="user-menu-button" tabindex="-1">
                    <!-- Active: "bg-gray-100", Not Active: "" -->
                    <a href="#" class="block px-4 py-2 text-sm text-gray-700" role="menuitem" tabindex="-1" id="user-menu-item-0">Your Profile</a>

                    <a href="#" class="block px-4 py-2 text-sm text-gray-700" role="menuitem" tabindex="-1" id="user-menu-item-1">Sign out</a>
                  </div>
                </div>

                <button type="button" data-drawer-target="drawer-navigation" data-drawer-show="drawer-navigation" aria-controls="drawer-navigation" class="flex bg-indigo-600 p-1 rounded-full items-center justify-center text-white hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                  <!-- Heroicon name: outline/plus-sm -->
                  <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 9l10.5-3m0 6.553v3.75a2.25 2.25 0 01-1.632 2.163l-1.32.377a1.803 1.803 0 11-.99-3.467l2.31-.66a2.25 2.25 0 001.632-2.163zm0 0V2.25L9 5.25v10.303m0 0v3.75a2.25 2.25 0 01-1.632 2.163l-1.32.377a1.803 1.803 0 01-.99-3.467l2.31-.66A2.25 2.25 0 009 15.553z" />
                  </svg>

                  <span class="sr-only">Add file</span>
                </button>
              </div>
            </div>
          </div>
        </header>

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