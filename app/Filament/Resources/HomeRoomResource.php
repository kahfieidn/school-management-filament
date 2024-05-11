<?php

namespace App\Filament\Resources;

use App\Filament\Resources\HomeRoomResource\Pages;
use App\Filament\Resources\HomeRoomResource\RelationManagers;
use App\Models\HomeRoom;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class HomeRoomResource extends Resource
{
    protected static ?string $model = HomeRoom::class;
    protected static ?string $navigationGroup = 'Schedule';
    protected static ?int $navigationSort = 3;



    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('teacher_id')
                    ->required()
                    ->numeric(),
                Forms\Components\TextInput::make('classroom_id')
                    ->required()
                    ->numeric(),
                Forms\Components\TextInput::make('periode_id')
                    ->required()
                    ->numeric(),
                Forms\Components\Toggle::make('is_open')
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('teacher_id')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('classroom_id')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('periode_id')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\IconColumn::make('is_open')
                    ->boolean(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListHomeRooms::route('/'),
            'create' => Pages\CreateHomeRoom::route('/create'),
            'view' => Pages\ViewHomeRoom::route('/{record}'),
            'edit' => Pages\EditHomeRoom::route('/{record}/edit'),
        ];
    }
}
