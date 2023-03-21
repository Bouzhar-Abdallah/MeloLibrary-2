<!-- component -->
<!-- This is an example component -->
<!-- <div class="w-full">
    <div class='flex w-8/12  bg-white shadow-md rounded-lg overflow-hidden mx-auto'>
        <div class="flex flex-col w-full">
            <div class="flex p-5 border-b">
                <img class='w-20 h-20 object-cover' alt='User avatar' src='https://images.unsplash.com/photo-1477118476589-bff2c5c4cfbb?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=200&q=200'>
                <div class="flex flex-col px-2 w-full">
                    <span class="text-xs text-gray-700 uppercase font-medium ">
                        now playing
                    </span>
                    <span class="text-sm text-red-500 capitalize font-semibold pt-1">
                       I think I need a sunrise, I'm tired of the sunset    
                    </span>
                    <span class="text-xs text-gray-500 uppercase font-medium ">
                        -"Boston," Augustana
                    </span>
                    <div class="flex justify-end">
                        <img class="w-5 cursor-pointer" src="https://www.iconpacks.net/icons/2/free-favourite-icon-2765-thumb.png" />
                        <img class="w-5 cursor-pointer mx-2" src="https://www.iconpacks.net/icons/2/free-favourite-icon-2765-thumb.png" />
                        <img class="w-5 cursor-pointer" src="https://www.iconpacks.net/icons/2/free-favourite-icon-2765-thumb.png" />
                    </div>
                </div>
            </div>

            <div class="flex flex-col sm:flex-row items-center p-5">
                <div class="flex items-center">
                    <div class="flex space-x-3 p-2">
        <button class="focus:outline-none">
          <svg class="w-4 h-4" viewBox="0 0 24 24" fill="none" stroke="#ef4444" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polygon points="19 20 9 12 19 4 19 20"></polygon><line x1="5" y1="19" x2="5" y2="5"></line></svg>
        </button>
        <button class="rounded-full w-10 h-10 flex items-center justify-center pl-0.5 ring-1 ring-red-400 focus:outline-none">
          <svg class="w-5 h-5" viewBox="0 0 24 24" fill="none" stroke="#ef4444" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polygon points="5 3 19 12 5 21 5 3"></polygon></svg>
        </button>
        <button class="focus:outline-none">
          <svg class="w-4 h-4" viewBox="0 0 24 24" fill="none" stroke="#ef4444" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polygon points="5 4 15 12 5 20 5 4"></polygon><line x1="19" y1="5" x2="19" y2="19"></line></svg>
        </button>
      </div>
                </div>
                <div class="relative w-full sm:w-1/2 md:w-7/12 lg:w-4/6 ml-2">
                    <div class="bg-red-300 h-2 w-full rounded-lg"></div>
                     <div class="bg-red-500 h-2 w-1/2 rounded-lg absolute top-0"></div>
        
                </div>
                <div class="flex justify-end w-full sm:w-auto pt-1 sm:pt-0">
<span class="text-xs text-gray-700 uppercase font-medium pl-2">
                    02:00/04:00                   
                </span>
                </div>
                
            </div>
            
            <div class="flex flex-col p-5">
                <div class="border-b pb-1 flex justify-between items-center mb-2">
                    <span class=" text-base font-semibold uppercase text-gray-700"> play list</span>
                    <img class="w-4 cursor-pointer" src="https://p.kindpng.com/picc/s/152-1529312_filter-ios-filter-icon-png-transparent-png.png" />
                </div>

                <div class="flex border-b py-3 cursor-pointer hover:shadow-md px-2 ">
                    <img class='w-10 h-10 object-cover rounded-lg' alt='User avatar' src='https://images.unsplash.com/photo-1477118476589-bff2c5c4cfbb?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=200&q=200'>
                    <div class="flex flex-col px-2 w-full">
                        
                        <span class="text-sm text-red-500 capitalize font-semibold pt-1">
                        I think I need a sunrise, I'm tired of the sunset    
                        </span>
                        <span class="text-xs text-gray-500 uppercase font-medium ">
                            -"Boston," Augustana
                        </span>
                    </div>
                </div>
                 <div class="flex border-b py-3 cursor-pointer hover:shadow-md px-2 ">
                    <img class='w-10 h-10 object-cover rounded-lg' alt='User avatar' src='https://images.unsplash.com/photo-1477118476589-bff2c5c4cfbb?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=200&q=200'>
                    <div class="flex flex-col px-2 w-full">
                        
                        <span class="text-sm text-red-500 capitalize font-semibold pt-1">
                        I think I need a sunrise, I'm tired of the sunset    
                        </span>
                        <span class="text-xs text-gray-500 uppercase font-medium ">
                            -"Boston," Augustana
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div> -->

<div x-data="musicPlayer()" x-init="init()">
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
