<?php

namespace App\Filament\Resources\AuditCommissionResource\Pages;

use App\Filament\Resources\AuditCommissionResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListAuditCommissions extends ListRecords
{
    protected static string $resource = AuditCommissionResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
