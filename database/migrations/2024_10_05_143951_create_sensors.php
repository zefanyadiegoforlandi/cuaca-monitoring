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
        Schema::create('sensors', function (Blueprint $table) {
            $table->string('sensor_id', 255)->primary(); // Menetapkan sensor_id sebagai primary key
            $table->unsignedBigInteger('user_id'); // ID pengguna yang memiliki sensor
            $table->string('name_sensor'); // Nama sensor
            $table->timestamp('activation_date'); // Mengubah ke timestamp dengan default
            $table->timestamps(); // Kolom created_at dan updated_at

            // Menambahkan foreign key
            $table->foreign('user_id')->references('user_id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sensors'); // Menghapus tabel jika migrasi dibatalkan
    }
};
