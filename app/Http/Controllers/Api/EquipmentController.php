<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Equipment;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Validator;
class EquipmentController extends Controller
{
    /**
     * Menampilkan semua katalog alat sewa (GET /api/equipments)
     */
    public function index(): JsonResponse
    {
        $equipments = Equipment::all();

        return response()->json([
            'status' => 'success',
            'message' => 'Daftar peralatan sewa berhasil diambil',
            'data' => $equipments
        ], 200);
    }
    public function store(Request $request): JsonResponse
    {
        // 1. Validasi input
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:150',
            'category' => 'required|string|max:100',
            'daily_rental_rate' => 'required|numeric|min:0',
            'total_stock' => 'required|integer|min:0',
        ]);

        // 2. Tangani jika validasi gagal (Status Code: 422)
        if ($validator->fails()) {
            return response()->json([
                'status' => 'error',
                'message' => 'Validasi gagal',
                'errors' => $validator->errors()
            ], 422);
        }

        // 3. Simpan data ke basis data
        $equipment = Equipment::create([
            'name' => $request->name,
            'category' => $request->category,
            'daily_rental_rate' => $request->daily_rental_rate,
            'total_stock' => $request->total_stock,
        ]);

        // 4. Kembalikan respons berhasil (Status Code: 201)
        return response()->json([
            'status' => 'success',
            'message' => 'Peralatan sewa berhasil ditambahkan',
            'data' => $equipment
        ], 201);
    }
}
