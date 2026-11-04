<?php

namespace App\Livewire;

use App\Models\UnidadeAcademica;
use Filament\Widgets\ChartWidget;

class UnidadesCursosChart extends ChartWidget
{
    // Removido o 'static' para ser compatível com a arquitetura atual do Filament
    protected ?string $heading = 'Distribuição de Cursos por Unidade Académica';
    protected static ?int $sort = 2;

    protected function getData(): array
    {
        // Vai buscar as unidades à base de dados e conta os cursos associados
        $unidades = UnidadeAcademica::withCount('cursos')->get();

        return [
            'datasets' => [
                [
                    'label' => 'Número de Cursos',
                    'data' => $unidades->pluck('cursos_count')->toArray(),
                    'backgroundColor' => '#00225a', // Azul institucional UniRovuma
                    'borderColor' => '#f97316',     // Laranja institucional
                    'borderRadius' => 6,
                ],
            ],
            'labels' => $unidades->pluck('nome')->toArray(),
        ];
    }

    protected function getType(): string
    {
        return 'bar';
    }
}