<?php

namespace App\Filament\Resources\TeacherResource\RelationManagers;

use Filament\Forms;
use Filament\Tables;
use App\Models\Periode;
use Filament\Forms\Form;
use App\Models\Classroom;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Filament\Forms\Components\Actions\Action;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Resources\RelationManagers\RelationManager;

class ClassroomRelationManager extends RelationManager
{
    protected static string $relationship = 'classroom';

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('classroom_id')
                    ->label('Classroom')
                    ->preload()
                    ->options(Classroom::all()->pluck('name', 'id'))
                    ->relationship(name: 'classroom', titleAttribute: 'name')
                    ->createOptionForm([
                        Forms\Components\TextInput::make('name')
                            ->required()
                            ->maxLength(255),
                        Forms\Components\TextInput::make('slug')
                            ->required()
                            ->maxLength(255),
                    ])
                    ->createOptionAction(
                        fn (Action $action) => $action->modalWidth('3xl')
                            ->modalHeading('Add Classroom'),
                    )
                    ->searchable(),
                Forms\Components\Select::make('periode_id')
                    ->options(Periode::all()->pluck('name', 'id'))
                    ->label('Periode')
                    ->preload()
                    ->searchable()
                    ->relationship(name: 'periode', titleAttribute: 'name')
                    ->createOptionForm([
                        Forms\Components\TextInput::make('name')
                            ->required()
                            ->maxLength(255),
                    ])
                    ->createOptionAction(
                        fn (Action $action) => $action->modalWidth('3xl')
                            ->modalHeading('Add Periode'),
                    ),
            ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('name')
            ->columns([
                Tables\Columns\TextColumn::make('classroom.name'),
                Tables\Columns\TextColumn::make('periode.name'),
                Tables\Columns\ToggleColumn::make('is_open'),
            ])
            ->filters([
                //
            ])
            ->headerActions([
                Tables\Actions\CreateAction::make(),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }
}
