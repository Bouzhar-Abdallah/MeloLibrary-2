<div class="flex items-start space-x-4">

<h1>song</h1>
</div>
<section class="relative flex items-center justify-center antialiased  bg-gray-100 min-w-screen">
    <div class="container px-0 mx-auto sm:px-5">


        <x-user.comment />

    </div>
</section>
<div class="flex items-start space-x-4">

  <div class="min-w-0 flex-1">
    <form action="#" class="relative">
      <div class="border border-gray-300 rounded-lg shadow-sm overflow-hidden focus-within:border-indigo-500 focus-within:ring-1 focus-within:ring-indigo-500">
        <label for="comment" class="sr-only">Add your comment</label>
        <textarea rows="3" name="comment" id="comment" class="block w-full py-3 border-0 resize-none focus:ring-0 sm:text-sm" placeholder="Add your comment..."></textarea>

        <!-- Spacer element to match the height of the toolbar -->
        <div class="py-2" aria-hidden="true">
          <!-- Matches height of button in toolbar (1px border + 36px content height) -->
          <div class="py-px">
            <div class="h-9"></div>
          </div>
        </div>
      </div>

      <div class="absolute bottom-0 inset-x-0 pl-3 pr-2 py-2 flex justify-between">
        
        <div class="flex-shrink-0">
          <button type="submit" class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Post</button>
        </div>
      </div>
    </form>
  </div>
</div>