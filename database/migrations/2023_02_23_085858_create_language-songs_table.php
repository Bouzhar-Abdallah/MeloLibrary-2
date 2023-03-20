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
        Schema::create('language-song', function (Blueprint $table) {
            $table->foreignId('song_id')
                ->constrained('songs')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->foreignId('language_id')
                ->constrained('languages')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('language-song');
    }
};
