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
        Schema::table('chrono_statuses', function (Blueprint $table) {
            $table->enum('name', ['break', 'lunch', 'coaching', 'bathroom', 'active_pause']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('chrono_statuses', function (Blueprint $table) {
            
        });
    }
};
