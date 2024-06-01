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
        Schema::create('chrono_stops', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->foreignId('employee_id')->references('id')->on('chrono_employees');
            $table->foreignId('status_id')->references('id')->on('chrono_statuses');
            $table->datetime('start_date');
            $table->datetime('end_date')->nullable();
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
        Schema::dropIfExists('chrono_stops');
    }
};
