<?php

namespace App\Filament\Resources\StudentHasClassResource\Pages;

use App\Filament\Resources\StudentHasClassResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewStudentHasClass extends ViewRecord
{
    protected static string $resource = StudentHasClassResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make(),
        ];
    }
}
