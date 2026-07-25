<?php

namespace App\Filament\Resources\JenisIzins\Pages;

use App\Filament\Resources\JenisIzins\JenisIzinResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditJenisIzin extends EditRecord
{
    protected static string $resource = JenisIzinResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
