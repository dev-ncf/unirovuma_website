<?php

namespace App\Filament\Admin\Resources\CentroEstudos\Pages;

use App\Filament\Admin\Resources\CentroEstudos\CentroEstudoResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditCentroEstudo extends EditRecord
{
    protected static string $resource = CentroEstudoResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
