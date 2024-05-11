<?php

namespace App\Filament\Resources\CategoryNilaiResource\Pages;

use App\Filament\Resources\CategoryNilaiResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListCategoryNilais extends ListRecords
{
    protected static string $resource = CategoryNilaiResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
