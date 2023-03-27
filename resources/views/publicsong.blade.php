@extends('layouts.guest')

@section('title', $title)

@section('content')
<div>
    <audio id="audio-player" src="{{ $song->url }}"></audio>

    <button id="play-btn" onclick="play()">Play</button>
    <button id="pause-btn" onclick="pause()">Pause</button>

    <div>
        <input type="range" id="seek-bar" value="0">
    </div>
</div>

<script>
    // Get the audio element
    const audioPlayer = document.getElementById('audio-player');

    // Get the play and pause buttons
    const playButton = document.getElementById('play-btn');
    const pauseButton = document.getElementById('pause-btn');

    // Get the seek bar
    const seekBar = document.getElementById('seek-bar');

    // Play the audio
    function play() {
        audioPlayer.play();
    }

    // Pause the audio
    function pause() {
        audioPlayer.pause();
    }

    // Update the seek bar as the audio plays
    audioPlayer.addEventListener('timeupdate', function() {
        const currentTime = audioPlayer.currentTime;
        const duration = audioPlayer.duration;
        const percent = (currentTime / duration) * 100;

        seekBar.value = percent;
    });

    // Seek to the selected position in the audio
    seekBar.addEventListener('change', function() {
        const percent = seekBar.value;
        const duration = audioPlayer.duration;

        audioPlayer.currentTime = (duration * percent) / 100;
    });
</script>



@endsection