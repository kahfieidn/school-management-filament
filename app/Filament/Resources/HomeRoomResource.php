<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use App\Models\Periode;
use App\Models\Teacher;
use App\Models\HomeRoom;
use Filament\Forms\Form;
use App\Models\Classroom;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use Illuminate\Database\Eloquent\Builder;
use App\Filament\Resources\HomeRoomResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\HomeRoomResource\RelationManagers;

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
                Forms\Components\Select::make('teacher_id')
                    ->relationship('teacher', 'name', )
                    ->required(),
                Forms\Components\Select::make('classroom_id')
                    ->relationship(name: 'classroom', titleAttribute: 'name')
                    ->required(),
                Forms\Components\Select::make('periode_id')
                    ->relationship(name: 'periode', titleAttribute: 'name')
                    ->required(),
                Forms\Components\Toggle::make('is_open')
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('teacher.name')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('classroom.name')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('periode.name')
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
            // 'create' => Pages\CreateHomeRoom::route('/create'),
            'view' => Pages\ViewHomeRoom::route('/{record}'),
            'edit' => Pages\EditHomeRoom::route('/{record}/edit'),
        ];
    }
}
