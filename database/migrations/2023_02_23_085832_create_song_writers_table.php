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
        Schema::create('song_writer', function (Blueprint $table) {
            $table->foreignId('song_id')
                ->constrained('songs')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->foreignId('writer_id')
                ->constrained('writers')
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
        Schema::dropIfExists('song_writer');
    }
};
