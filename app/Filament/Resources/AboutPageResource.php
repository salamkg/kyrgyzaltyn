<?php

namespace App\Filament\Resources;

use App\Filament\Resources\AboutPageResource\Pages;
use App\Filament\Resources\AboutPageResource\RelationManagers;
use App\Models\AboutPage;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class AboutPageResource extends Resource
{
    protected static ?string $model = AboutPage::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                \Filament\Forms\Components\TextInput::make('title')
                ->required()
                ->label('Заголовок страницы'),

                \Filament\Forms\Components\RichEditor::make('content')
                    ->required()
                    ->columnSpanFull()
                    ->label('Содержимое (текст о компании и политики)'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                \Filament\Tables\Columns\TextColumn::make('title')->searchable()->label('Заголовок'),
                \Filament\Tables\Columns\TextColumn::make('updated_at')->dateTime()->label('Обновлено'),
            ])
            ->filters([
                //
            ])
            ->actions([
                \Filament\Tables\Actions\EditAction::make(),
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
            'index' => Pages\ListAboutPages::route('/'),
            'create' => Pages\CreateAboutPage::route('/create'),
            'edit' => Pages\EditAboutPage::route('/{record}/edit'),
        ];
    }
}
