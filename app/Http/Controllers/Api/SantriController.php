<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Santri;
use Illuminate\Http\Request;

class SantriController extends Controller
{
    public function index()
    {
        $santris = Santri::all();

        return response()->json([
            'data' => $santris
        ]);
    }
}
