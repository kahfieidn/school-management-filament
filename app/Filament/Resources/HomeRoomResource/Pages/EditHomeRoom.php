<?php

namespace App\Filament\Resources\HomeRoomResource\Pages;

use App\Filament\Resources\HomeRoomResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditHomeRoom extends EditRecord
{
    protected static string $resource = HomeRoomResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\ViewAction::make(),
            Actions\DeleteAction::make(),
        ];
    }
}
