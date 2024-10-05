<?php

namespace App\Http\Controllers;

use App\Models\SensorData;
use Illuminate\Http\Request;

class SensorDataController extends Controller
{
    // Menampilkan semua data sensor
    public function index()
    {
        return SensorData::all();
    }

    // Menyimpan data sensor baru
    public function store(Request $request)
    {
        try {
            $request->validate([
                'sensor_id' => 'required|string|max:255',
                'altitude' => 'required|numeric',
                'pressure' => 'required|numeric',
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
        return SensorData::findOrFail($sensor_data_id);
    }

    // Memperbarui data sensor
    public function update(Request $request, $sensor_data_id)
    {
        try {
            // Cari data sensor berdasarkan sensor_data_id
            $sensorData = SensorData::findOrFail($sensor_data_id);

            // Validasi input
            $request->validate([
                'sensor_id' => 'sometimes|required|string|max:255',
                'altitude' => 'sometimes|required|numeric',
                'pressure' => 'sometimes|required|numeric',
                'temperature' => 'sometimes|required|numeric',
                'humidity' => 'sometimes|required|numeric',
            ]);

            // Update data sensor dengan data yang valid
            $sensorData->update($request->only(['sensor_id', 'altitude', 'pressure', 'temperature', 'humidity']));

            return response()->json($sensorData);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 400);
        }
    }

    // Menghapus data sensor
    public function destroy($sensor_data_id)
    {
        $sensorData = SensorData::findOrFail($sensor_data_id);
        $sensorData->delete();

        return response()->json(null, 204);
    }
}
