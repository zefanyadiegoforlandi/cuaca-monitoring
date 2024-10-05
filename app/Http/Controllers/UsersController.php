<?php

namespace App\Http\Controllers;

use App\Models\Users;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UsersController extends Controller
{
    // Menampilkan semua pengguna
    public function index()
    {
        return Users::all();
    }

    // Menyimpan pengguna baru
    public function store(Request $request)
    {
        try {
            $request->validate([
                'name' => 'required|string|max:255',
                'email' => 'required|string|email|max:255|unique:users',
                'password' => 'required|string|min:8',
                'role' => 'required|in:admin,user',
            ]);
    
            $user = Users::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'role' => $request->role,
            ]);
    
            return response()->json($user, 201);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 400);
        }
    }
    
    // Menampilkan pengguna berdasarkan ID
    public function show($user_id)
    {
        return Users::findOrFail($user_id);
    }

    // Memperbarui pengguna
    public function update(Request $request, $user_id)
{
    try {
        // Cari pengguna berdasarkan user_id
        $user = Users::where('user_id', $user_id)->firstOrFail();

        // Validasi input
        $request->validate([
            'name' => 'sometimes|required|string|max:255',
            'email' => 'sometimes|required|string|email|max:255|unique:users,email,' . $user->user_id . ',user_id', // Ubah ini
            'password' => 'sometimes|required|string|min:8',
            'role' => 'sometimes|required|in:admin,user',
        ]);

        // Hash password jika diberikan
        if ($request->has('password')) {
            $request['password'] = Hash::make($request->password);
        }

        // Update pengguna dengan data yang valid
        $user->update($request->only(['name', 'email', 'password', 'role']));

        return response()->json($user);
    } catch (\Exception $e) {
        return response()->json(['error' => $e->getMessage()], 400);
    }
}

    


    // Menghapus pengguna
    public function destroy($user_id)
    {
        $user = Users::findOrFail($user_id);
        $user->delete();

        return response()->json(null, 204);
    }
}
