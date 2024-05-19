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
        Schema::create('schedules', function (Blueprint $table) {
            $table->id();
            $table->string('schedule_shift', 5);
            $table->char('schedule_defined_id', 10)->nullable(false)->unique();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('schedules');

        Schema::table('schedules', function (Blueprint $table) {
            $table->dropForeign(['id_date']); 
            $table->dropColumn('id_date'); 
        });

    }
};
