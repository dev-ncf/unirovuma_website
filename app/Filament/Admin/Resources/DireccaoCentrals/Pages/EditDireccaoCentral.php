<?php

namespace App\Filament\Admin\Resources\DireccaoCentrals\Pages;

use App\Filament\Admin\Resources\DireccaoCentrals\DireccaoCentralResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditDireccaoCentral extends EditRecord
{
    protected static string $resource = DireccaoCentralResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
