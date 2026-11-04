<?php

namespace App\Filament\Admin\Resources\Direcaos\Pages;

use App\Filament\Admin\Resources\Direcaos\DirecaoResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditDirecao extends EditRecord
{
    protected static string $resource = DirecaoResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
