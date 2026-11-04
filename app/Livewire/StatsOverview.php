<?php

namespace App\Livewire;

use App\Models\UnidadeAcademica;
use App\Models\MenuItem;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class StatsOverview extends BaseWidget
{
    protected static ?int $sort = 1;

    protected function getStats(): array
    {
        // Contagem de unidades por categoria
        $totalFaculdades = UnidadeAcademica::where('tipo', 'faculdade')->count();
        $totalInstitutos = UnidadeAcademica::where('tipo', 'instituto')->count();
        $totalCentros = UnidadeAcademica::where('tipo', 'centro')->count();
        $totalDireccoes = UnidadeAcademica::where('tipo', 'direccao')->count();

        return [
            Stat::make('Total de Unidades Académicas', UnidadeAcademica::count())
                ->description("Faculdades: {$totalFaculdades} | Institutos: {$totalInstitutos}")
                ->descriptionIcon('heroicon-m-building-library')
                ->color('success'),

            Stat::make('Centros de Estudo & Direcções', $totalCentros + $totalDireccoes)
                ->description("Centros: {$totalCentros} | Direcções Centrais: {$totalDireccoes}")
                ->descriptionIcon('heroicon-m-building-office-2')
                ->color('info'),

            Stat::make('Itens do Menu Dinâmico', MenuItem::count())
                ->description('Links geridos no painel do site')
                ->descriptionIcon('heroicon-m-bars-3')
                ->color('warning'),
        ];
    }
}