<?php

namespace App\Filament\Resources\Santris\Schemas;

use App\Models\Kamar;
use App\Models\Kelas;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class SantriForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('nis')
                    ->required(),
                TextInput::make('nama')
                    ->required(),
                Select::make('kelas_id')
                    ->label('Kelas')
                    ->relationship('kelas', 'nama_kelas')
                    ->searchable()
                    ->preload()
                    ->required(),
                Select::make('kamar_id')
                    ->label('Kamar')
                    ->relationship('kamar', 'nama_kamar')
                    ->searchable()
                    ->preload()
                    ->required(),
                TextInput::make('no_hp')
                    ->required(),
                TextInput::make('password')
                    ->password()
                    ->required(),
                TextInput::make('foto')
                    ->default(null),
            ]);
    }
}
