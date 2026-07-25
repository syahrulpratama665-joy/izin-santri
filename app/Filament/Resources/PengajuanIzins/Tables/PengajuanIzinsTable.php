<?php

namespace App\Filament\Resources\PengajuanIzins\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\Action;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class PengajuanIzinsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('santri.nama')
                    ->label('Santri')
                    ->searchable(),

                TextColumn::make('jenisIzin.nama_izin')
                    ->label('Jenis Izin')
                    ->searchable(),

                TextColumn::make('tanggal_keluar')
                    ->label('Tanggal Keluar')
                    ->date(),

                TextColumn::make('tanggal_kembali')
                    ->label('Tanggal Kembali')
                    ->date(),

                TextColumn::make('status')
                    ->label('Status')
                    ->badge()
                    ->colors([
                        'warning' => 'Menunggu',
                        'success' => 'Disetujui',
                        'danger' => 'Ditolak',
                    ]),
            ])
            ->filters([
                //
            ])
            ->recordActions([
                EditAction::make(),

                Action::make('setujui')
                    ->label('Setujui')
                    ->icon('heroicon-o-check-circle')
                    ->color('success')
                    ->requiresConfirmation()
                    ->action(function ($record) {
                        $record->update([
                            'status' => 'Disetujui',
                        ]);
                    }),

                Action::make('tolak')
                    ->label('Tolak')
                    ->icon('heroicon-o-x-circle')
                    ->color('danger')
                    ->requiresConfirmation()
                    ->action(function ($record) {
                        $record->update([
                            'status' => 'Ditolak',
                        ]);
                    }),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
