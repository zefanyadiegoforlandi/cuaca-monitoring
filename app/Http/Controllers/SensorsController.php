<?php

namespace App\Http\Controllers;

use App\Models\Sensors; // Pastikan model ini sudah ada
use Illuminate\Http\Request;

class SensorsController extends Controller
{
    // Menampilkan semua sensor
    public function index()
    {
        return Sensors::all();
    }

    // Menyimpan sensor baru
    public function store(Request $request)
    {
        try {
            $request->validate([
                'user_id' => 'required|integer', // Validasi user_id sebagai integer
                'name_sensor' => 'required|string|max:255',
            ]);
    
            $sensor = Sensors::create([
                'user_id' => $request->user_id,
                'name_sensor' => $request->name_sensor,
            ]);
    
            return response()->json($sensor, 201);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 400);
        }
    }
    
    // Menampilkan sensor berdasarkan ID
    public function show($sensor_id)
    {
        return Sensors::findOrFail($sensor_id);
    }

    // Memperbarui sensor
    public function update(Request $request, $sensor_id)
    {
        try {
            // Cari sensor berdasarkan sensor_id
            $sensor = Sensors::where('sensor_id', $sensor_id)->firstOrFail();

            // Validasi input
            $request->validate([
                'user_id' => 'sometimes|required|integer', // Validasi user_id
                'name_sensor' => 'sometimes|required|string|max:255',
            ]);

            // Update sensor dengan data yang valid
            $sensor->update($request->only(['user_id', 'name_sensor']));

            return response()->json($sensor);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 400);
        }
    }

    // Menghapus sensor
    public function destroy($sensor_id)
    {
        $sensor = Sensors::findOrFail($sensor_id);
        $sensor->delete();

        return response()->json(null, 204);
    }
}
