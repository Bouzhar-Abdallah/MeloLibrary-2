<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::rename('song_artists', 'artist_song');
        Schema::rename('song_bands', 'band_song');
        Schema::rename('song_genres', 'genre_song');
    }

    public function down()
    {
        Schema::rename('artist_song', 'song_artists');
        Schema::rename('band_song', 'song_bands');
        Schema::rename('genre_song', 'song_genres');
    }
};
