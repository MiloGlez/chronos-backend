<?php
use Illuminate\Support\Facades\DB;
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
        Schema::create('chrono_jobs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name', 255);
            $table->softDeletes();
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrent()->useCurrentOnUpdate();
        });

        // Inserta algunos registros
        DB::table('chrono_jobs')->insert([
            ['name' => 'gerente'],
            ['name' => 'asesor'],
            ['name' => 'contador'],
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('chrono_jobs');
    }
};
