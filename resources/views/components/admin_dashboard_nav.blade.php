<header class="shadow border-t bg-gray-50 flex items-center justify-between">
  <div class="max-w-7xl mr-auto py-3 px-2 sm:px-6 lg:px-8 ">
    <h1 class="text-3xl font-bold leading-tight text-gray-900">Dashboard</h1>
  </div>
  <span class="relative z-0 inline-flex shadow-sm rounded-md px-4">
    <button type="button" class="relative inline-flex items-center px-4 py-2 rounded-l-md border border-gray-300 bg-white text-sm font-medium text-gray-700 hover:bg-gray-50 focus:z-10 focus:outline-none focus:ring-1 focus:ring-indigo-500 focus:border-indigo-500">Years</button>
    <button type="button" class="-ml-px relative inline-flex items-center px-4 py-2 border border-gray-300 bg-white text-sm font-medium text-gray-700 hover:bg-gray-50 focus:z-10 focus:outline-none focus:ring-1 focus:ring-indigo-500 focus:border-indigo-500">Months</button>
    <a href="{{ route('admin.song.new') }}" type="button" class="-ml-px relative inline-flex items-center px-4 py-2 rounded-r-md border border-gray-300 bg-white text-sm font-medium text-gray-700 hover:bg-gray-50 focus:z-10 focus:outline-none focus:ring-1 focus:ring-indigo-500 focus:border-indigo-500">new song</a>
  </span>
</header>