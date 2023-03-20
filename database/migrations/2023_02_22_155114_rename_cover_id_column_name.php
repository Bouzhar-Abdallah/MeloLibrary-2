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
        Schema::table('songs', function (Blueprint $table) {
            $table->dropColumn('cover_id');
        });
        Schema::table('songs', function (Blueprint $table) {
            $table->string('cover_url');
        });


        Schema::table('bands', function (Blueprint $table) {
            $table->dropColumn('cover_id');
        });
        Schema::table('bands', function (Blueprint $table) {
            $table->string('cover_url');
        });


        Schema::table('artists', function (Blueprint $table) {
            $table->dropColumn('cover_id');
        });
        Schema::table('artists', function (Blueprint $table) {
            $table->string('cover_url');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('songs', function (Blueprint $table) {
            $table->dropColumn('cover_url');
            $table->unsignedBigInteger('cover_id')->nullable();
        });

        Schema::table('bands', function (Blueprint $table) {
            $table->dropColumn('cover_url');
            $table->unsignedBigInteger('cover_id')->nullable();
        });

        Schema::table('artists', function (Blueprint $table) {
            $table->dropColumn('cover_url');
            $table->unsignedBigInteger('cover_id')->nullable();
        });
    }
};
