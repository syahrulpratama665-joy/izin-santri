<?php

namespace App\Filament\Resources\Kamars\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class KamarForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('nama_kamar')
                    ->required(),
            ]);
    }
}
