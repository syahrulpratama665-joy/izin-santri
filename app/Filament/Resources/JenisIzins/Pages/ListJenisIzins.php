<?php

namespace App\Filament\Resources\JenisIzins\Pages;

use App\Filament\Resources\JenisIzins\JenisIzinResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListJenisIzins extends ListRecords
{
    protected static string $resource = JenisIzinResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
