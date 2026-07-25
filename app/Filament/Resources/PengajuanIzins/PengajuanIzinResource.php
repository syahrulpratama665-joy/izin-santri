<?php

namespace App\Filament\Resources\PengajuanIzins;

use App\Filament\Resources\PengajuanIzins\Pages\CreatePengajuanIzin;
use App\Filament\Resources\PengajuanIzins\Pages\EditPengajuanIzin;
use App\Filament\Resources\PengajuanIzins\Pages\ListPengajuanIzins;
use App\Filament\Resources\PengajuanIzins\Schemas\PengajuanIzinForm;
use App\Filament\Resources\PengajuanIzins\Tables\PengajuanIzinsTable;
use App\Models\PengajuanIzin;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class PengajuanIzinResource extends Resource
{
    protected static ?string $model = PengajuanIzin::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'keperluan';

    public static function form(Schema $schema): Schema
    {
        return PengajuanIzinForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return PengajuanIzinsTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListPengajuanIzins::route('/'),
            'create' => CreatePengajuanIzin::route('/create'),
            'edit' => EditPengajuanIzin::route('/{record}/edit'),
        ];
    }
}
