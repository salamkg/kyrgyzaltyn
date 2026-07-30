<?php

namespace App\Filament\Resources;

use App\Filament\Resources\TenderResource\Pages;
use App\Filament\Resources\TenderResource\RelationManagers;
use App\Models\Tender;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class TenderResource extends Resource
{
    protected static ?string $model = Tender::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                \Filament\Forms\Components\TextInput::make('title')
                    ->required()
                    ->columnSpanFull()
                    ->label('Заголовок объявления / тендера'),

                \Filament\Forms\Components\RichEditor::make('description')
                    ->columnSpanFull()
                    ->label('Описание'),

                \Filament\Forms\Components\FileUpload::make('file_path')
                    ->directory('tenders')
                    ->label('Документ / Файл тендера (PDF/DOC)'),

                \Filament\Forms\Components\DatePicker::make('published_at')
                    ->required()
                    ->default(now())
                    ->label('Дата публикации'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                \Filament\Tables\Columns\TextColumn::make('title')->searchable()->limit(50)->label('Заголовок'),
                \Filament\Tables\Columns\TextColumn::make('published_at')->date()->sortable()->label('Дата'),
            ])
            ->defaultSort('published_at', 'desc')
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
            'index' => Pages\ListTenders::route('/'),
            'create' => Pages\CreateTender::route('/create'),
            'edit' => Pages\EditTender::route('/{record}/edit'),
        ];
    }
}
