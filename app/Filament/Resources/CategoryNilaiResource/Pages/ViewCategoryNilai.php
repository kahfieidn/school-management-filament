<?php

namespace App\Filament\Resources\CategoryNilaiResource\Pages;

use App\Filament\Resources\CategoryNilaiResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewCategoryNilai extends ViewRecord
{
    protected static string $resource = CategoryNilaiResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make(),
        ];
    }
    
}
