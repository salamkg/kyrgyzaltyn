<?php

namespace App\Filament\Resources;

use App\Filament\Resources\FeedbackResource\Pages;
use App\Filament\Resources\FeedbackResource\RelationManagers;
use App\Models\Feedback;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class FeedbackResource extends Resource
{
    protected static ?string $model = Feedback::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                \Filament\Forms\Components\TextInput::make('name')->label('Ф.И.О.')->disabled(),
                \Filament\Forms\Components\TextInput::make('address')->label('Адрес')->disabled(),
                \Filament\Forms\Components\TextInput::make('phone')->label('Телефон')->disabled(),
                \Filament\Forms\Components\TextInput::make('email')->label('Email')->disabled(),
                \Filament\Forms\Components\TextInput::make('type')->label('Вид обращения')->disabled(),
                \Filament\Forms\Components\Textarea::make('message')->columnSpanFull()->label('Текст обращения')->disabled(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                \Filament\Tables\Columns\TextColumn::make('name')->searchable()->label('Ф.И.О.'),
                \Filament\Tables\Columns\TextColumn::make('phone')->label('Телефон'),
                \Filament\Tables\Columns\TextColumn::make('type')->label('Вид'),
                \Filament\Tables\Columns\TextColumn::make('created_at')->dateTime()->sortable()->label('Дата'),
            ])
            ->defaultSort('created_at', 'desc')
            ->filters([])
            ->actions([
                \Filament\Tables\Actions\ViewAction::make(),
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
            'index' => Pages\ListFeedback::route('/'),
            'create' => Pages\CreateFeedback::route('/create'),
            'edit' => Pages\EditFeedback::route('/{record}/edit'),
        ];
    }
}
