<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('sensor_data', function (Blueprint $table) {
            $table->id('sensor_data_id'); // Secara otomatis akan unik
            $table->unsignedBigInteger('sensor_id');
            $table->float('altitude');
            $table->float('pressure');
            $table->float('temperature');
            $table->float('humidity');
            $table->timestamps();

            $table->foreign('sensor_id')->references('sensor_id')->on('sensors')->onDelete('cascade');
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sensor_data');
    }
};
