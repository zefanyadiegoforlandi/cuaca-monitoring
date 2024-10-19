<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sensor_data', function (Blueprint $table) {
            $table->id('sensor_data_id'); // ID unik untuk setiap data sensor
            $table->string('sensor_id', 255); // ID sensor dalam format string
            $table->float('kualitas_udara'); // Kualitas udara
            $table->float('temperature'); // Suhu
            $table->float('humidity'); // Kelembapan
            $table->timestamps(); // Kolom created_at dan updated_at

            // Menambahkan foreign key
            $table->foreign('sensor_id')->references('sensor_id')->on('sensors')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sensor_data'); // Menghapus tabel jika migrasi dibatalkan
    }
};
