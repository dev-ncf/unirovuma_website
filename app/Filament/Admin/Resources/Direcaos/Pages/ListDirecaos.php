<?php

namespace App\Filament\Admin\Resources\Direcaos\Pages;

use App\Filament\Admin\Resources\Direcaos\DirecaoResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListDirecaos extends ListRecords
{
    protected static string $resource = DirecaoResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
