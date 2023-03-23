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
        // For the artist_song table
        Schema::table('artist_song', function (Blueprint $table) {
            $table->dropColumn('id');
        });

        // For the band_song table
        Schema::table('band_song', function (Blueprint $table) {
            $table->dropColumn('id');
        });

        // For the genre_song table
        Schema::table('genre_song', function (Blueprint $table) {
            $table->dropColumn('id');
        });
    }

    public function down()
    {
        // To roll back the migration, we need to add the id column back to each table
        Schema::table('artist_song', function (Blueprint $table) {
            $table->id();
        });

        Schema::table('band_song', function (Blueprint $table) {
            $table->id();
        });

        Schema::table('genre_song', function (Blueprint $table) {
            $table->id();
        });
    }
};
