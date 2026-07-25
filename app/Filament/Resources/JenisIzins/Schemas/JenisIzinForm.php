<?php

namespace App\Filament\Resources\JenisIzins\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class JenisIzinForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('nama_izin')
                    ->label('Nama Izin')
                    ->required(),
            ]);
    }
}