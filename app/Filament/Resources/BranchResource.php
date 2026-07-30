<?php

namespace App\Filament\Resources;

use App\Filament\Resources\BranchResource\Pages;
use App\Filament\Resources\BranchResource\RelationManagers;
use App\Models\Branch;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class BranchResource extends Resource
{
    protected static ?string $model = Branch::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                \Filament\Forms\Components\TextInput::make('title')
                    ->required()
                    ->label('Название компании'),

                \Filament\Forms\Components\FileUpload::make('image_path')
                    ->required()
                    ->image()
                    ->directory('branches')
                    ->label('Фотография / Обложка'),

                \Filament\Forms\Components\RichEditor::make('content')
                    ->required()
                    ->columnSpanFull()
                    ->label('Подробное описание'),

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
                \Filament\Tables\Columns\ImageColumn::make('image_path')->label('Фото'),
                \Filament\Tables\Columns\TextColumn::make('title')->searchable()->sortable()->label('Название'),
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
            'index' => Pages\ListBranches::route('/'),
            'create' => Pages\CreateBranch::route('/create'),
            'edit' => Pages\EditBranch::route('/{record}/edit'),
        ];
    }
}
