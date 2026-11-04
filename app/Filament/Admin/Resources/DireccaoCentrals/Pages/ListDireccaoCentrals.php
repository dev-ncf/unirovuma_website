<?php

namespace App\Filament\Admin\Resources\DireccaoCentrals\Pages;

use App\Filament\Admin\Resources\DireccaoCentrals\DireccaoCentralResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListDireccaoCentrals extends ListRecords
{
    protected static string $resource = DireccaoCentralResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
