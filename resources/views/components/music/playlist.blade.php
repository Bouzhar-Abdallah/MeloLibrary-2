<div class="mt-60">
    
    <ul>
       @foreach ($playlists as $playlist )
           <li class="bg-red-400">{{$playlist->name}}
            <ul>
                @foreach ($playlist->songs as $song )
                    
                <li class="bg-blue-200">{{$song->title}}</li>
                @endforeach
            </ul>
           </li>
       @endforeach
    </ul>
</div>