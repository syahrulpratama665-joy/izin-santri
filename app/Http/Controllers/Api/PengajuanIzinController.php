<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\PengajuanIzin;
use Illuminate\Http\Request;

class PengajuanIzinController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'jenis_izin_id' => 'required',
            'tanggal_keluar' => 'required|date',
            'tanggal_kembali' => 'required|date',
            'keperluan' => 'required',
        ]);

        $santri = $request->user();

        $pengajuan = PengajuanIzin::create([
            'santri_id' => $santri->id,
            'jenis_izin_id' => $request->jenis_izin_id,
            'tanggal_keluar' => $request->tanggal_keluar,
            'tanggal_kembali' => $request->tanggal_kembali,
            'keperluan' => $request->keperluan,
            'status' => 'Menunggu',
        ]);

        return response()->json([
            'message' => 'Pengajuan izin berhasil dibuat',
            'data' => $pengajuan
        ], 201);
    }

    public function index(Request $request)
    {
        $santri = $request->user();

        $pengajuan = PengajuanIzin::with(['santri', 'jenisIzin'])
            ->where('santri_id', $santri->id)
            ->latest()
            ->get();

        return response()->json([
            'data' => $pengajuan
        ]);
    }
}