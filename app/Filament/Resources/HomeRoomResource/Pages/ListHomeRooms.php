<?php

namespace App\Filament\Resources\HomeRoomResource\Pages;

use App\Filament\Resources\HomeRoomResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListHomeRooms extends ListRecords
{
    protected static string $resource = HomeRoomResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
