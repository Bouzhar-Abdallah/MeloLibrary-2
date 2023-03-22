@if ($playing_playlist)
<x-music.media_player :playlist_naame="$playing_playlist"/>
    
@endif


@foreach ($playlists as $playlist )
<div id="accordion-collapse-{{$playlist->id}}" data-accordion="collapse">
    <h2 id="accordion-collapse-heading-{{$playlist->id}}">
        <div type="button" class="flex items-center justify-between w-full font-medium text-left text-gray-500 border border-b-0 border-gray-200 focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-800 dark:border-gray-700 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-800" >
            
            <span>
            <button class="p-3 hover:bg-green-500 group focus:outline-none">
                <svg class="w-4 h-4 group-hover:text-white" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <polygon points="5 3 19 12 5 21 5 3"></polygon>
                </svg>
            </button>    
            {{$playlist->name}} </span>
            <button
            data-accordion-target="#accordion-collapse-body-{{$playlist->id}}" aria-expanded="true" aria-controls="accordion-collapse-body-{{$playlist->id}}">
            <svg data-accordion-icon class="w-6 h-6 rotate-180 shrink-0" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path>
            </svg>
        </button>
        </div>
    </h2>
    <div id="accordion-collapse-body-{{$playlist->id}}" class="hidden" aria-labelledby="accordion-collapse-heading-{{$playlist->id}}">
        <div class="font-light border border-b-0 border-gray-200 dark:border-gray-700 dark:bg-gray-900">
            @foreach ($playlist->songs as $song )
            <ul class="text-xs sm:text-base divide-y border-t cursor-default">
                <li class="flex items-center space-x-3 hover:bg-gray-100">

                    <div class="flex-1 p-3">
                        Artist - {{$song->title}}
                    </div>
                    <div class="text-xs text-gray-400 p-3">
                        {{$song->duration}}
                    </div>

                </li>

            </ul>

            @endforeach
        </div>
    </div>



</div>


@endforeach