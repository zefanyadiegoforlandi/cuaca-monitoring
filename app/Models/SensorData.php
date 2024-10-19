<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SensorData extends Model
{
    use HasFactory;

    // Menentukan nama tabel jika tidak mengikuti konvensi Laravel
    protected $table = 'sensor_data';

    // Menentukan kolom yang dapat diisi
    protected $fillable = [
        'sensor_id',
        'kualitas_udara',
        'temperature',
        'humidity',
        'post_date',
    ];

    // Nonaktifkan timestamps jika tidak digunakan
    public $timestamps = false; // Tambahkan ini jika tidak ingin timestamps

    // Mengatur primary key
    protected $primaryKey = 'sensor_data_id'; // Ubah ke sensor_data_id
    public $incrementing = false; // Jika sensor_data_id bukan auto increment
    protected $keyType = 'string'; // Ganti dengan tipe data yang sesuai jika bukan string
}
