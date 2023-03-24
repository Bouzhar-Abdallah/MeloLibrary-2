<!-- This example requires Tailwind CSS v2.0+ -->

<div class="">

  <div class="mt-8 flex flex-col">
    <div class="-my-2 -mx-4 overflow-x-auto sm:-mx-6 lg:-mx-8">
      <div class="inline-block min-w-full py-2 align-middle md:px-6 lg:px-8">
        <div class="overflow-hidden shadow ring-1 ring-black ring-opacity-5 md:rounded-lg">
          <table class="min-w-full divide-y divide-gray-300">
            <thead class="bg-gray-50">
              <tr>
                <th scope="col" class="py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-900 sm:pl-6">Name</th>
                <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">Ratings</th>
                <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">Release date</th>
                <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">Genres</th>
                <th scope="col" class="relative py-3.5 pl-3 pr-4 sm:pr-6">
                  <span class="sr-only">Edit</span>
                </th>
              </tr>
            </thead>
            <tbody class="divide-y divide-gray-200 bg-white">
              @foreach ($songs as $song )
              <tr>
                <td class="whitespace-nowrap py-4 pl-4 pr-3 text-sm sm:pl-6">
                  <div class="flex items-center">
                    <div class="h-10 w-10 flex-shrink-0">
                      <img class="h-10 w-10 rounded-full" src="{{$song->cover_url}}" alt="">
                    </div>
                    <div class="ml-4">
                      <div class="font-medium text-gray-900">{{$song->title}}</div>
                      <div class="text-gray-500">{{implode(' ft ',$song->song_owners)}}</div>
                    </div>
                  </div>
                </td>
                <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
                  <div class="text-gray-500 flex">
                    
                    <livewire:ratings :rating="(round($song->song_ratings_avg_rating, 1))"/>
                    <div class="ml-2">
                      {{ round($song->song_ratings_avg_rating, 1) }}
                    </div>
                  </div>

        </div>

        </td>
        <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
          {{$song->release_date}}
        </td>
        <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">{{implode(' - ',$song->genre_names)}}</td>
        <td class="relative whitespace-nowrap py-4 pl-3 pr-4 text-right text-sm font-medium sm:pr-6">
          <div class="flex ml-auto">

            <a href="#" class="text-indigo-600 hover:text-indigo-900">
              <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="M9.75 9.75l4.5 4.5m0-4.5l-4.5 4.5M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
              </svg>
            </a>
            <a href="">
              <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L6.832 19.82a4.5 4.5 0 01-1.897 1.13l-2.685.8.8-2.685a4.5 4.5 0 011.13-1.897L16.863 4.487zm0 0L19.5 7.125" />
              </svg>

            </a>
          </div>
        </td>
        </tr>
        @endforeach

        <!-- More people... -->
        </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
</div>