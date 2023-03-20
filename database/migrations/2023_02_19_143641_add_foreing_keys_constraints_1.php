<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('artists', function (Blueprint $table) {
            $table->foreign('cover_id')->references('id')->on('photos')->onUpdate('cascade')->onDelete('cascade');
        });
        
        Schema::table('bands', function (Blueprint $table) {
            $table->foreign('cover_id')->references('id')->on('photos')->onUpdate('cascade')->onDelete('cascade');
        });
        
        Schema::table('songs', function (Blueprint $table) {
            $table->foreign('cover_id')->references('id')->on('photos')->onUpdate('cascade')->onDelete('cascade');
        });
        
        Schema::table('song_genres', function (Blueprint $table) {
            $table->foreign('genre_id')->references('id')->on('genres')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('song_id')->references('id')->on('songs')->onUpdate('cascade')->onDelete('cascade');
        });
        
        Schema::table('song_bands', function (Blueprint $table) {
            $table->foreign('song_id')->references('id')->on('songs')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('band_id')->references('id')->on('bands')->onUpdate('cascade')->onDelete('cascade');
        });
        
        Schema::table('song_artists', function (Blueprint $table) {
            $table->foreign('song_id')->references('id')->on('songs')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('artist_id')->references('id')->on('artists')->onUpdate('cascade')->onDelete('cascade');
        });
        
        Schema::table('band_artists', function (Blueprint $table) {
            $table->foreign('band_id')->references('id')->on('bands')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('artist_id')->references('id')->on('artists')->onUpdate('cascade')->onDelete('cascade');
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('artists', function (Blueprint $table) {
            if (Schema::hasColumn('artists', 'cover_id')) {
                $table->dropForeign(['cover_id']);
            }
        });
        
        Schema::table('bands', function (Blueprint $table) {
            if (Schema::hasColumn('bands', 'cover_id')) {
                $table->dropForeign(['cover_id']);
            }
        });
        
        Schema::table('songs', function (Blueprint $table) {
            if (Schema::hasColumn('songs', 'cover_id')) {
                $table->dropForeign(['cover_id']);
            }
        });
        
        Schema::table('song_genres', function (Blueprint $table) {
            if (Schema::hasColumn('song_genres', 'genre_id')) {
                $table->dropForeign(['genre_id']);
            }
            if (Schema::hasColumn('song_genres', 'song_id')) {
                $table->dropForeign(['song_id']);
            }
        });
        
        Schema::table('song_bands', function (Blueprint $table) {
            if (Schema::hasColumn('song_bands', 'song_id')) {
                $table->dropForeign(['song_id']);
            }
            if (Schema::hasColumn('song_bands', 'band_id')) {
                $table->dropForeign(['band_id']);
            }
        });
        
        Schema::table('song_artists', function (Blueprint $table) {
            if (Schema::hasColumn('song_artists', 'song_id')) {
                $table->dropForeign(['song_id']);
            }
            if (Schema::hasColumn('song_artists', 'artist_id')) {
                $table->dropForeign(['artist_id']);
            }
        });
        
        Schema::table('band_artists', function (Blueprint $table) {
            if (Schema::hasColumn('band_artists', 'band_id')) {
                $table->dropForeign(['band_id']);
            }
            if (Schema::hasColumn('band_artists', 'artist_id')) {
                $table->dropForeign(['artist_id']);
            }
        });
        
    }
};
