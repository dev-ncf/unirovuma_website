<?php

namespace App\Filament\Admin\Resources\UnidadeAcademicas\Pages;

use App\Filament\Admin\Resources\UnidadeAcademicas\UnidadeAcademicaResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditUnidadeAcademica extends EditRecord
{
    protected static string $resource = UnidadeAcademicaResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
