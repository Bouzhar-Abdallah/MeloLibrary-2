<div x-data="musicPlayer()" x-init="init()">
<div class=" bg-gray-100 flex flex-col items-center justify-center">
  <div class="max-w-xl bg-white rounded-lg shadow-lg w-full">
    <div class="relative h-20">
      
      <div class=" p-2 inset-0 flex flex-col justify-end bg-indigo-500 to-gray-900 backdrop backdrop-blur-5 text-white">
        <h3 class="font-bold">$playing_playlist</h3>
        <span x-text="currentTrack.title" class="opacity-70">Albumtitle</span>
        
      </div>
    </div>
    <div>
      <div class="relative h-1 bg-gray-200">
        <div class="absolute h-full w-1/2 bg-green-500 flex items-center justify-end">
          <div class="rounded-full w-3 h-3 bg-white shadow"></div>
        </div>
      </div>
    </div>
    <div class="flex justify-between text-xs font-semibold text-gray-500 px-4 py-2">
      <div>
        1:50
      </div>
      <div class="flex space-x-3 p-2">
        <button class="focus:outline-none">
          <svg class="w-4 h-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polygon points="19 20 9 12 19 4 19 20"></polygon><line x1="5" y1="19" x2="5" y2="5"></line></svg>
        </button>
        <button class="rounded-full w-8 h-8 flex items-center justify-center pl-0.5 ring-2 ring-gray-100 focus:outline-none">
          <svg class="w-5 h-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polygon points="5 3 19 12 5 21 5 3"></polygon></svg>
        </button>
        <button class="focus:outline-none">
          <svg class="w-4 h-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polygon points="5 4 15 12 5 20 5 4"></polygon><line x1="19" y1="5" x2="19" y2="19"></line></svg>
        </button>
      </div>
      <div>
        3:00
      </div>
    </div>
    <ul class="text-xs sm:text-base divide-y border-t cursor-default">
      <li class="flex items-center space-x-3 hover:bg-gray-100">
        <button class="p-3 hover:bg-green-500 group focus:outline-none">
          <svg class="w-4 h-4 group-hover:text-white" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polygon points="5 3 19 12 5 21 5 3"></polygon></svg>
        </button>
        <div class="flex-1">
          Artist - Title
        </div>
        <div class="text-xs text-gray-400 p-3">
          2:58
        </div>
       
      </li>
      <li class="flex items-center space-x-3 hover:bg-gray-100">
        <button class="p-3 hover:bg-green-500 group focus:outline-none">
          <svg class="w-4 h-4 group-hover:text-white" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polygon points="5 3 19 12 5 21 5 3"></polygon></svg>
        </button>
        <div class="flex-1">
          Artist - Title
        </div>
        <div class="text-xs text-gray-400 p-3">
          2:58
        </div>
       
      </li>
    </ul>
  </div>
</div>


    <button @click="play()" x-text="isPlaying ? 'Pause' : 'Play'"></button>
    <button @click="playPrevious()">Previous</button>
    <button @click="playNext()">Next</button>
    <audio x-ref="audioPlayer" @ended="playNext()" :src="currentTrack.url" preload="auto"></audio>

    <div>
        <span>Now Playing: </span>
        <span x-text="currentTrack.title"></span>
    </div>
</div>


<script>
    function musicPlayer() {
        return {
            isPlaying: false,
            currentTrack: {
                title: '',
                url: ''
            },
            tracks: [
                // Add your Cloudinary music file URLs here
                { title: 'lose yourself', url: 'https://res.cloudinary.com/doy8hfzvk/video/upload/v1678283815/tiye2wnyeeszbt7s17vn.mp3' },
                { title: 'halo', url: 'https://res.cloudinary.com/doy8hfzvk/video/upload/v1679436728/Beyonce%CC%81_-_Halo_aivahp.mp4' },
                // ...
            ],
            trackIndex: 0,

            init() {
                this.currentTrack = this.tracks[this.trackIndex];
            },

            play() {
                const audio = this.$refs.audioPlayer;

                if (this.isPlaying) {
                    audio.pause();
                } else {
                    audio.play();
                }

                this.isPlaying = !this.isPlaying;
            },
            playPrevious() {
            this.trackIndex = (this.trackIndex - 1 + this.tracks.length) % this.tracks.length;
            this.currentTrack = this.tracks[this.trackIndex];
            this.isPlaying = true;
            this.$refs.audioPlayer.play();
        },
            playNext() {
                this.trackIndex = (this.trackIndex + 1) % this.tracks.length;
                this.currentTrack = this.tracks[this.trackIndex];
                this.isPlaying = true;
                this.$refs.audioPlayer.play();
            },
        };
    }
</script>
