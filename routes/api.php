<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\SantriController;
use App\Http\Controllers\Api\JenisIzinController;
use App\Http\Controllers\Api\PengajuanIzinController;
use App\Http\Controllers\Api\SantriAuthController;

Route::post('/login', [AuthController::class, 'login']);

Route::post('/santri/login', [SantriAuthController::class, 'login']);

Route::get('/santri', [SantriController::class, 'index']);

Route::get('/jenis-izin', [JenisIzinController::class, 'index']);

Route::middleware('auth:sanctum')->group(function () {

    Route::post('/pengajuan-izin', [PengajuanIzinController::class, 'store']);

    Route::get('/pengajuan-izin', [PengajuanIzinController::class, 'index']);
});