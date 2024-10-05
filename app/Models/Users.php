<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Users extends Model
{
    use HasFactory;

    // Menentukan nama tabel jika tidak mengikuti konvensi Laravel
    protected $table = 'users';

    // Menentukan kolom yang dapat diisi
    protected $fillable = [
        'name',
        'email',
        'password',
        'role',
    ];

    // Mengamankan password saat mengambil data
    protected $hidden = [
        'password',
    ];

    // Nonaktifkan timestamps
    public $timestamps = false; // Tambahkan ini

    // Mengatur primary key
    protected $primaryKey = 'user_id'; // Ubah ke user_id
    public $incrementing = false; // Jika user_id bukan auto increment
    protected $keyType = 'string'; // Ganti dengan tipe data yang sesuai jika bukan string
}
