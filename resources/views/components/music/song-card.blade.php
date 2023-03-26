<li class="col-span-1 flex flex-col text-center bg-white rounded-lg shadow divide-y divide-gray-200">
    <div class="flex-1 flex flex-col p-8">
        <img class="w-32 h-32 flex-shrink-0 mx-auto rounded-full" src="{{$song->cover_url}}" alt="">
        <h3 class="mt-6 text-gray-900 text-sm font-medium">{{$song->title}}</h3>
        <dl class="mt-1 flex-grow flex flex-col justify-between">
            <dt class="sr-only">Title</dt>
            <dd class="text-gray-500 text-sm">{{$songOwners}}</dd>
            <dt class="sr-only">Role</dt>
            <dd class="mt-3 mx-auto">
                <div class="flex items-center">
                    <x-normal-ratings :rating="(round($song->song_ratings_avg_rating, 1))" />
                    <div class="ml-2 text-sm text-gray-600">
                        {{ round($song->song_ratings_avg_rating, 1) }}
                    </div>
                </div>
            </dd>
        </dl>
    </div>
    <div>


        <div class="-mt-px flex divide-x divide-gray-200">
            <div class="w-0 flex-1 flex">
                <div id="tooltip-playlist-{{$song->id}}" role="tooltip" class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-white transition-opacity duration-300 bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-700">
                    add to playlist
                    <div class="tooltip-arrow" data-popper-arrow></div>
                </div>
                <button data-tooltip-target="tooltip-playlist-{{$song->id}}" id="dropdownDefaultButton{{$song->id}}" data-dropdown-toggle="dropdown{{$song->id}}" class="hover:bg-indigo-600 relative -mr-px w-0 flex-1 inline-flex items-center justify-center py-4 text-sm text-gray-700 font-medium border border-transparent rounded-bl-lg hover:text-gray-500" type="button">

                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 text-gray-400">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v6m3-3H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>

                </button>
            </div>
            <div id="tooltip-play-{{$song->id}}" role="tooltip" class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-white transition-opacity duration-300 bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-700">
                play
                <div class="tooltip-arrow" data-popper-arrow></div>
            </div>
            <button data-tooltip-target="tooltip-play-{{$song->id}}" class="w-20 hover:bg-green-600 flex items-center justify-center">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 text-gray-400">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M5.25 5.653c0-.856.917-1.398 1.667-.986l11.54 6.348a1.125 1.125 0 010 1.971l-11.54 6.347a1.125 1.125 0 01-1.667-.985V5.653z" />
                </svg>

            </button>

            <div class="-ml-px w-0 flex-1 flex ">
                <div id="tooltip-comment-{{$song->id}}" role="tooltip" class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-white transition-opacity duration-300 bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-700">
                    comments
                    <div class="tooltip-arrow" data-popper-arrow></div>
                </div>
                <a data-tooltip-target="tooltip-comment-{{$song->id}}" href="tel:+1-202-555-0170" class="relative w-0 flex-1 inline-flex items-center justify-center py-4 text-sm text-gray-700 font-medium border border-transparent rounded-br-lg hover:bg-indigo-600 hover:text-white">

                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 text-gray-400">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M20.25 8.511c.884.284 1.5 1.128 1.5 2.097v4.286c0 1.136-.847 2.1-1.98 2.193-.34.027-.68.052-1.02.072v3.091l-3-3c-1.354 0-2.694-.055-4.02-.163a2.115 2.115 0 01-.825-.242m9.345-8.334a2.126 2.126 0 00-.476-.095 48.64 48.64 0 00-8.048 0c-1.131.094-1.976 1.057-1.976 2.192v4.286c0 .837.46 1.58 1.155 1.951m9.345-8.334V6.637c0-1.621-1.152-3.026-2.76-3.235A48.455 48.455 0 0011.25 3c-2.115 0-4.198.137-6.24.402-1.608.209-2.76 1.614-2.76 3.235v6.226c0 1.621 1.152 3.026 2.76 3.235.577.075 1.157.14 1.74.194V21l4.155-4.155" />
                    </svg>


                </a>
            </div>
        </div>
    </div>
    <div id="dropdown{{$song->id}}" class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700">
        <ul class="py-2 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownDefaultButton{{$song->id}}">
            @foreach ($playlists as $playlist)
            <li>

                <form method="POST" action="{{ route('add.song.playlist') }}">

                    @csrf
                    <input type="hidden" name="song_id" value="{{ $song->id }}">
                    <input type="hidden" name="playlist_id" value="{{ $playlist->id }}">
                    <button type="submit" class="w-full px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">
                        {{ $playlist->name }}
                    </button>
                </form>


            </li>
            @endforeach


        </ul>
    </div>
</li>