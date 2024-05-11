<?php

namespace App\Filament\Resources\HomeRoomResource\Pages;

use App\Filament\Resources\HomeRoomResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewHomeRoom extends ViewRecord
{
    protected static string $resource = HomeRoomResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make(),
        ];
    }
}
