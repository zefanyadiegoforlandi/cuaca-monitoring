<?php
// app/Http/Controllers/SensorDataProxyController.php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;

class ProxySensorDataController extends Controller
{
    public function getSensorData()
    {
        $response = Http::get('http://athe.my.id:8080/api/sensordata'); // Ganti dengan URL API HTTP Anda

        if ($response->successful()) {
            return response()->json([
                'status' => 'success',
                'message' => 'Data sensor berhasil diambil',
                'data' => $response->json()
            ]);
        } else {
            return response()->json([
                'status' => 'error',
                'message' => 'Gagal mengambil data sensor',
                'error' => $response->body()
            ], $response->status());
        }
    }
}
