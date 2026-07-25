<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\JenisIzin;
use App\Models\Santri;

class PengajuanIzin extends Model
{
    protected $fillable = [
        'santri_id',
        'jenis_izin_id',
        'tanggal_keluar',
        'tanggal_kembali',
        'keperluan',
        'status',
        'catatan',
        'file_pendukung',
    ];

    public function jenisIzin()
    {
        return $this->belongsTo(JenisIzin::class);
    }

    public function santri()
    {
        return $this->belongsTo(Santri::class);
    }
}