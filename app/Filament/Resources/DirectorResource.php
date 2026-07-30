<?php

namespace App\Filament\Resources;

use App\Filament\Resources\DirectorResource\Pages;
use App\Filament\Resources\DirectorResource\RelationManagers;
use App\Models\Director;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class DirectorResource extends Resource
{
    protected static ?string $model = Director::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                \Filament\Forms\Components\TextInput::make('name')
                    ->required()
                    ->label('ФИО члена совета'),

                \Filament\Forms\Components\TextInput::make('position')
                    ->required()
                    ->label('Должность'),

                \Filament\Forms\Components\FileUpload::make('photo_path')
                    ->required()
                    ->directory('directors')
                    ->image()
                    ->label('Фотография'),

                \Filament\Forms\Components\TextInput::make('sort_order')
                    ->numeric()
                    ->default(0)
                    ->label('Порядок сортировки'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                \Filament\Tables\Columns\ImageColumn::make('photo_path')->label('Фото'),
                \Filament\Tables\Columns\TextColumn::make('name')->searchable()->sortable()->label('ФИО'),
                \Filament\Tables\Columns\TextColumn::make('position')->label('Должность'),
                \Filament\Tables\Columns\TextColumn::make('sort_order')->sortable()->label('Порядок'),
            ])
            ->defaultSort('sort_order', 'asc')
            ->filters([])
            ->actions([
                \Filament\Tables\Actions\EditAction::make(),
                \Filament\Tables\Actions\DeleteAction::make(),
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
            'index' => Pages\ListDirectors::route('/'),
            'create' => Pages\CreateDirector::route('/create'),
            'edit' => Pages\EditDirector::route('/{record}/edit'),
        ];
    }
}
