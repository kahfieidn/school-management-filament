<?php

namespace App\Filament\Resources\CategoryNilaiResource\Pages;

use App\Filament\Resources\CategoryNilaiResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditCategoryNilai extends EditRecord
{
    protected static string $resource = CategoryNilaiResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\ViewAction::make(),
            Actions\DeleteAction::make(),
        ];
    }
}
