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
        Schema::create('chrono_employees', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name', 255);
            $table->string('last_namme', 255);
            $table->string('phone', 255);
            $table->string('email', 255);
            $table->string('password', 255);
            $table->foreignId('profile_id')->references('id')->on('chrono_profiles');
            $table->foreignId('job_id')->references('id')->on('chrono_jobs');
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
        Schema::dropIfExists('chrono_employees');
    }
};
