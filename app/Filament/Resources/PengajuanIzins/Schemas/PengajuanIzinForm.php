<?php

namespace App\Filament\Resources\PengajuanIzins\Schemas;

use Filament\Schemas\Schema;
use Filament\Forms\Components\Select;
use App\Models\Santri;
use App\Models\JenisIzin;

class PengajuanIzinForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('santri_id')
                    ->label('Santri')
                    ->options(Santri::pluck('nama', 'id'))
                    ->searchable()
                    ->required(),

                Select::make('jenis_izin_id')
                    ->label('Jenis Izin')
                    ->options(JenisIzin::pluck('nama_izin', 'id'))
                    ->searchable()
                    ->required(),

                \Filament\Forms\Components\DatePicker::make('tanggal_keluar')
                    ->label('Tanggal Keluar')
                    ->required(),

                \Filament\Forms\Components\DatePicker::make('tanggal_kembali')
                    ->label('Tanggal Kembali')
                    ->required(),

                \Filament\Forms\Components\Textarea::make('keperluan')
                    ->label('Keperluan')
                    ->required()
                    ->rows(3),

                Select::make('status')
                    ->label('Status')
                    ->options([
                        'Menunggu' => 'Menunggu',
                        'Disetujui' => 'Disetujui',
                        'Ditolak' => 'Ditolak',
                    ])
                    ->default('Menunggu')
                    ->required(),

                \Filament\Forms\Components\Textarea::make('catatan')
                    ->label('Catatan')
                    ->rows(3),

                \Filament\Forms\Components\FileUpload::make('file_pendukung')
                    ->label('File Pendukung')
                    ->directory('file-pendukung')
                    ->disk('public')
                    ->acceptedFileTypes([
                        'application/pdf',
                        'image/jpeg',
                        'image/png',
                    ]),
            ]);
    }
}