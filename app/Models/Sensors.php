<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sensors extends Model
{
    use HasFactory;

    // Menentukan nama tabel jika tidak mengikuti konvensi Laravel
    protected $table = 'sensors';

    // Menentukan kolom yang dapat diisi
    protected $fillable = [
        'user_id',
        'name_sensor',
    ];

    // Nonaktifkan timestamps jika tidak digunakan
    public $timestamps = false; // Tambahkan ini jika tidak ingin timestamps

    // Mengatur primary key
    protected $primaryKey = 'sensor_id'; // Ubah ke sensor_id
    public $incrementing = false; // Jika sensor_id bukan auto increment
    protected $keyType = 'string'; // Ganti dengan tipe data yang sesuai jika bukan string
}
