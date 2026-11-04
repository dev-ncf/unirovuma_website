<?php

namespace App\Filament\Admin\Resources\CentroEstudos\Pages;

use App\Filament\Admin\Resources\CentroEstudos\CentroEstudoResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListCentroEstudos extends ListRecords
{
    protected static string $resource = CentroEstudoResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
