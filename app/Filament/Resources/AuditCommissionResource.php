<?php

namespace App\Filament\Resources;

use App\Filament\Resources\AuditCommissionResource\Pages;
use App\Filament\Resources\AuditCommissionResource\RelationManagers;
use App\Models\AuditCommission;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class AuditCommissionResource extends Resource
{
    protected static ?string $model = AuditCommission::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                \Filament\Forms\Components\TextInput::make('name')->required()->label('ФИО'),
                \Filament\Forms\Components\TextInput::make('position')->required()->label('Должность'),
                \Filament\Forms\Components\FileUpload::make('photo_path')->directory('audit')->image()->label('Фотография (необязательно)'),
                \Filament\Forms\Components\TextInput::make('sort_order')->numeric()->default(0)->label('Порядок сортировки'),
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
            'index' => Pages\ListAuditCommissions::route('/'),
            'create' => Pages\CreateAuditCommission::route('/create'),
            'edit' => Pages\EditAuditCommission::route('/{record}/edit'),
        ];
    }
}
