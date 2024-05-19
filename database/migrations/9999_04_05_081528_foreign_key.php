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
        Schema::table('schedules', function (Blueprint $table) {
            $table->unsignedBigInteger('id_date');
            $table->foreign('id_date')->references('id')->on('dates');
        });

        Schema::table('logs', function (Blueprint $table) {
            $table->char('schedule_defined_id', 10);
            $table->foreign('schedule_defined_id')->references('schedule_defined_id')->on('schedules');

            $table->unsignedBigInteger('id_alsim');
            $table->foreign('id_alsim')->references('id')->on('alsims');
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('schedules', function (Blueprint $table) {
            $table->dropForeign(['id_date']); 
            $table->dropColumn('id_date'); 
        });

        Schema::table('logs', function (Blueprint $table) {
            $table->dropForeign(['schedule_defined_id']); 
            $table->dropColumn('schedule_defined_id'); 

            $table->dropForeign(['id_alsim']); 
            $table->dropColumn('id_alsim'); 
        });


    }
};
