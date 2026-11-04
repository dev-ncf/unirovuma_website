<?php

namespace App\Filament\Admin\Resources\Gabinetes\Pages;

use App\Filament\Admin\Resources\Gabinetes\GabineteResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditGabinete extends EditRecord
{
    protected static string $resource = GabineteResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
