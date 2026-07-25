<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Santri;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class SantriAuthController extends Controller
{
    public function login(Request $request)
    {
        $request->validate([
            'nis' => 'required',
            'password' => 'required',
        ]);

        $santri = Santri::where('nis', $request->nis)->first();

        if (! $santri || $request->password !== $santri->password) {
            return response()->json([
                'message' => 'NIS atau password salah'
            ], 401);
        }

        $token = $santri->createToken('santri-token')->plainTextToken;

        return response()->json([
            'message' => 'Login berhasil',
            'santri' => $santri,
            'token' => $token
        ]);
    }
}