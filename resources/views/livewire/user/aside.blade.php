<div>
  <div id="music-player">
    <audio id="audioPlayer" preload="auto"></audio>
    <div class="player" style="display: none;">
      <div class="bg-gray-100 flex flex-col items-center justify-center">
        <div class="max-w-xl bg-white shadow-lg w-full">
          <div class="relative h-20">
            <div class="p-2 inset-0 flex flex-col justify-end bg-indigo-500 to-gray-900 backdrop backdrop-blur-5 text-white">
              <h3 id="playlist-name" class="font-bold"></h3>
              <span id="track-title" class="opacity-70"></span>
            </div>
          </div>
          <div>
            <div class="relative h-1 bg-gray-200">
              <div id="progress-bar" class="absolute h-full w-1/2 bg-green-500 flex items-center justify-end">
                <div class="rounded-full w-3 h-3 bg-white shadow"></div>
              </div>
            </div>
          </div>
          <div class="flex justify-between text-xs font-semibold text-gray-500 px-4 py-2">
            <div id="current-time">1:50</div>
            <div class="flex space-x-3 p-2">
              <button id="previous-button" class="focus:outline-none">
                <svg class="w-4 h-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                  <polygon points="19 20 9 12 19 4 19 20"></polygon>
                  <line x1="5" y1="19" x2="5" y2="5"></line>
                </svg>
              </button>
              <button id="play-play-button" class=" rounded-full w-8 h-8 flex items-center justify-center pl-0.5 ring-2 ring-gray-100 focus:outline-none">
                <svg class="w-5 h-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                  <polygon points="5 3 19 12 5 21 5 3"></polygon>
                </svg>
              </button>
              <button id="play-pause-button" class="rounded-full w-8 h-8 hidden items-center justify-center pl-0.5 ring-2 ring-gray-100 focus:outline-none">
                <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                  <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 5.25v13.5m-7.5-13.5v13.5" />
                </svg>
                
              </button>
              <button id="next-button" class="focus:outline-none">
                <svg class="w-4 h-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                  <polygon points="5 4 15 12 5 20 5 4"></polygon>
                  <line x1="19" y1="5" x2="19" y2="19"></line>
                </svg>
              </button>
            </div>
            <div id="total-duration" class="opacity-70">
              <span id="minutes"></span> : <span id="seconds"></span>
            </div>
          </div>
          <!-- Tracklist section -->
        </div>
      </div>
      <audio id="audioPlayer" preload="auto"></audio>
    </div>
    <div class="no-playlist" style="display: none;">
      <div class="bg-gray-100 flex items-center justify-center h-screen">
        <h2 class="text-xl text-gray-600">No playlist available</h2>
      </div>
    </div>
    <div class="playlists">
      @foreach ($playlists as $playlist )

      <div id="accordion-collapse-{{$playlist->id}}" data-accordion="collapse">
        <h2 id="accordion-collapse-heading-{{$playlist->id}}">
          <div type="button" class="flex items-center justify-between w-full font-medium text-left text-gray-500 border border-b-0 border-gray-200 focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-800 dark:border-gray-700 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-800">

            <span>
              <button class="p-3 hover:bg-green-500 group focus:outline-none" data-playlist="{{ json_encode($playlist) }}">
                <svg class="w-4 h-4 group-hover:text-white" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                  <polygon points="5 3 19 12 5 21 5 3"></polygon>
                </svg>
              </button>
              {{$playlist->name}} </span>

            <button data-accordion-target="#accordion-collapse-body-{{$playlist->id}}" aria-expanded="true" aria-controls="accordion-collapse-body-{{$playlist->id}}">
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
    </div>
  </div>

  <script>
    document.addEventListener('DOMContentLoaded', function() {
      const playlists = <?php echo json_encode($playlists); ?>;
      console.log(playlists)
      const musicPlayer = document.getElementById('music-player');
      const player = musicPlayer.querySelector('.player');
      const noPlaylist = musicPlayer.querySelector('.no-playlist');
      const audioPlayer = document.getElementById('audioPlayer');
      let isPlaying = false;
      let currentPlaylist = playlists.length > 0 ? playlists[0] : null;
      let currentTrack = currentPlaylist ? currentPlaylist.songs[0] : null;
      let trackIndex = 0;

      if (currentPlaylist) {
        player.style.display = 'block';
        console.log(currentPlaylist)
        initPlayerInterface();
      } else {
        noPlaylist.style.display = 'block';
      }

      function initPlayerInterface() {
        // Initialize player interface with the current track and playlist
        /* document.getElementById('playlist-name').innerText = currentPlaylist.name;
        document.getElementById('track-title').innerText = currentTrack.title;
        document.getElementById('audioPlayer').src = currentTrack.url; */
        updateplayer()
        // Add event listeners for play, pause, next, and previous buttons
        document.getElementById('play-play-button').addEventListener('click', play);
        document.getElementById('play-pause-button').addEventListener('click', play);
        document.getElementById('previous-button').addEventListener('click', playPrevious);
        document.getElementById('next-button').addEventListener('click', playNext);

        // Add event listeners for updating the progress bar and current time
        audioPlayer.addEventListener('timeupdate', updateProgressBar);
        audioPlayer.addEventListener('timeupdate', updateCurrentTime);

        // Update the playlist and track information
        document.getElementById('total-duration').innerText = formatTime(currentTrack.duration);
        const playlistButtons = document.querySelectorAll('[data-playlist]');
        playlistButtons.forEach(button => {
          button.addEventListener('click', (event) => {
            const playlist = JSON.parse(event.currentTarget.dataset.playlist);
            setPlayingPlaylist(playlist);
          });
        });
      }

      function updateplayer() {
        document.getElementById('playlist-name').innerText = currentPlaylist.name;
        document.getElementById('track-title').innerText = currentTrack.title;
        document.getElementById('audioPlayer').src = currentTrack.url;
      }

      function formatTime(seconds) {
        const minutes = Math.floor(seconds / 60);
        const remainingSeconds = Math.floor(seconds % 60);
        return `${minutes}:${remainingSeconds < 10 ? '0' : ''}${remainingSeconds}`;
      }


      function play() {
        if (isPlaying) {
          audioPlayer.pause();
          document.getElementById('play-pause-button').classList.replace('flex','hidden')
          document.getElementById('play-play-button').classList.replace('hidden','flex');
        } else {
          audioPlayer.play();
          document.getElementById('play-pause-button').classList.replace('hidden','flex');
          document.getElementById('play-play-button').classList.replace('flex','hidden')
        }
        isPlaying = !isPlaying;
      }

      function playPrevious() {
        updateplayer()
        trackIndex = (trackIndex - 1 + currentPlaylist.songs.length) % currentPlaylist.songs.length;
        currentTrack = currentPlaylist.songs[trackIndex];
        isPlaying = false;
        audioPlayer.src = currentTrack.url;
        play()
      }

      function playNext() {
        updateplayer()
        trackIndex = (trackIndex + 1) % currentPlaylist.songs.length;
        currentTrack = currentPlaylist.songs[trackIndex];
        isPlaying = false;
        audioPlayer.src = currentTrack.url;
        play()
      }

      function setPlayingPlaylist(playlist) {
        currentPlaylist = playlist;
        trackIndex = 0;
        currentTrack = currentPlaylist.songs[trackIndex];
        isPlaying = false;
        audioPlayer.src = currentTrack.url;
        updateplayer()
        //audioPlayer.play();
      }

      function updateProgressBar() {
        // Update the progress bar based on the current time and duration of the track
      }

      function updateCurrentTime() {
        // Update the current time display based on the current time of the track
      }

      audioPlayer.addEventListener('ended', playNext);
    });
  </script>