<?php

namespace App\Http\Controllers;

use App\Models\SensorData;
use Illuminate\Http\Request;

class SensorDataController extends Controller
{
    // Menampilkan semua data sensor
    public function index()
    {
        try {
            $data = SensorData::all();
    
            if ($data->isEmpty()) {
                return response()->json([
                    'status' => 404,
                    'message' => 'Tidak ada data sensor ditemukan',
                    'data' => [],
                ], 404);
            }
    
            return response()->json([
                'status' => 200,
                'message' => 'Berhasil menampilkan data',
                'data' => $data,
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 500,
                'message' => 'Terjadi kesalahan pada server saat menampilkan data',
                'error' => $e->getMessage(),
            ], 500);
        }
    }
    

    // Menyimpan data sensor baru
    public function store(Request $request)
    {
        try {
            $request->validate([
                'sensor_id' => 'required|string|max:255',
                'kualitas_udara' => 'required|numeric',
                'temperature' => 'required|numeric',
                'humidity' => 'required|numeric',
            ]);

            $sensorData = SensorData::create($request->all());

            return response()->json($sensorData, 201);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 400);
        }
    }

    // Menampilkan data sensor berdasarkan ID
    public function show($sensor_data_id)
    {
        try {
            $sensorData = SensorData::find($sensor_data_id);
    
            if (!$sensorData) {
                return response()->json([
                    'status' => 404,
                    'message' => 'Data tidak ditemukan',
                ], 404);
            }
    
            return response()->json([
                'status' => 200,
                'message' => 'Berhasil menampilkan data',
                'data' => $sensorData,
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 500,
                'message' => 'Terjadi kesalahan pada server',
                'error' => $e->getMessage(),
            ], 500);
        }
    }
    

     // Memperbarui data sensor
     public function update(Request $request, $sensor_data_id)
     {
         // Validasi input
         $validatedData = $request->validate([
             'sensor_id' => 'sometimes|required|string|max:255',
             'kualitas_udara' => 'sometimes|required|numeric',
             'temperature' => 'sometimes|required|numeric',
             'humidity' => 'sometimes|required|numeric',
         ]);
 
         try {
             // Cari data sensor berdasarkan ID
             $sensorData = SensorData::find($sensor_data_id);
 
             if (!$sensorData) {
                 return response()->json([
                     'status' => 404,
                     'message' => 'Data tidak ditemukan',
                 ], 404);
             }
 
             // Update data sensor
             $sensorData->update($validatedData);
 
             return response()->json([
                 'status' => 200,
                 'message' => 'Berhasil memperbarui data',
                 'data' => $sensorData,
             ]);
         } catch (\Exception $e) {
             return response()->json([
                 'status' => 500,
                 'message' => 'Terjadi kesalahan pada server saat memperbarui data',
                 'error' => $e->getMessage(),
             ], 500);
         }
     }

    // Menghapus data sensor
    public function destroy($sensor_data_id)
    {
        try {
            $sensorData = SensorData::find($sensor_data_id);

            if (!$sensorData) {
                return response()->json([
                    'status' => 404,
                    'message' => 'Data tidak ditemukan',
                ], 404);
            }

            $sensorData->delete();

            return response()->json([
                'status' => 204,
                'message' => 'Data berhasil dihapus',
            ], 204);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 500,
                'message' => 'Terjadi kesalahan pada server saat menghapus data',
                'error' => $e->getMessage(),
            ], 500);
        }
    }
}
