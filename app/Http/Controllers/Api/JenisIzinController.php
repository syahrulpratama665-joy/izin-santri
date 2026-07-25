<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\JenisIzin;
use Illuminate\Http\Request;

class JenisIzinController extends Controller
{
    public function index()
    {
        $jenisIzins = JenisIzin::all();

        return response()->json([
            'data' => $jenisIzins
        ]);
    }
}