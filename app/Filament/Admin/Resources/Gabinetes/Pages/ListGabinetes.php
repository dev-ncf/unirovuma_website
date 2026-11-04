<?php

namespace App\Filament\Admin\Resources\Gabinetes\Pages;

use App\Filament\Admin\Resources\Gabinetes\GabineteResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListGabinetes extends ListRecords
{
    protected static string $resource = GabineteResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
