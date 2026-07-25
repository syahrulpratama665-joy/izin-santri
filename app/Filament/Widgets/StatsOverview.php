<?php

namespace App\Filament\Widgets;

use Filament\Widgets\StatsOverviewWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;
use App\Models\Santri;
use App\Models\Kelas;
use App\Models\Kamar;
use App\Models\PengajuanIzin;

class StatsOverview extends StatsOverviewWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make('Total Santri', Santri::count())
                ->description('Jumlah seluruh santri')
                ->color('primary'),

            Stat::make('Total Kelas', Kelas::count())
                ->description('Jumlah seluruh kelas')
                ->color('success'),

            Stat::make('Total Kamar', Kamar::count())
                ->description('Jumlah seluruh kamar')
                ->color('info'),

            Stat::make('Total Pengajuan', PengajuanIzin::count())
                ->description('Jumlah seluruh pengajuan izin')
                ->color('warning'),

            Stat::make('Menunggu', PengajuanIzin::where('status', 'Menunggu')->count())
                ->description('Pengajuan menunggu persetujuan')
                ->color('warning'),

            Stat::make('Disetujui', PengajuanIzin::where('status', 'Disetujui')->count())
                ->description('Pengajuan yang telah disetujui')
                ->color('success'),

            Stat::make('Ditolak', PengajuanIzin::where('status', 'Ditolak')->count())
                ->description('Pengajuan yang ditolak')
                ->color('danger'),
        ];
    }
}