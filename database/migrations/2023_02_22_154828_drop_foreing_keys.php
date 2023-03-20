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
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
