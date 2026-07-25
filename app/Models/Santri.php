<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Laravel\Sanctum\HasApiTokens;
use App\Models\Kelas;
use App\Models\Kamar;

class Santri extends Authenticatable
{
    use HasApiTokens;

    protected $fillable = [
        'nis',
        'nama',
        'kelas_id',
        'kamar_id',
        'no_hp',
        'password',
        'foto',
    ];

    protected $hidden = [
        'password',
    ];

    public function kelas()
    {
        return $this->belongsTo(Kelas::class);
    }

    public function kamar()
    {
        return $this->belongsTo(Kamar::class);
    }
}