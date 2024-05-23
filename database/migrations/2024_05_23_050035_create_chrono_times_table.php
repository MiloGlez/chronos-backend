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
        Schema::create('chrono_times', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->datetime('date_of_entry');
            $table->datetime('departure_date');
            $table->foreignId('employee_id')->references('id')->on('chrono_employees');
            $table->foreignId('stop_id')->references('id')->on('chrono_stops');
            $table->text('observation', 255);
            $table->softDeletes();
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrent()->useCurrentOnUpdate();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('chrono_times');
    }
};
