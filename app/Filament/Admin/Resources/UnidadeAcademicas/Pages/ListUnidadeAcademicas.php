<?php

namespace App\Filament\Admin\Resources\UnidadeAcademicas\Pages;

use App\Filament\Admin\Resources\UnidadeAcademicas\UnidadeAcademicaResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListUnidadeAcademicas extends ListRecords
{
    protected static string $resource = UnidadeAcademicaResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
