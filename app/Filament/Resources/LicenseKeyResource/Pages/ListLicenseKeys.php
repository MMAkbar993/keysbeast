<?php

namespace App\Filament\Resources\LicenseKeyResource\Pages;

use App\Filament\Resources\LicenseKeyResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListLicenseKeys extends ListRecords
{
    protected static string $resource = LicenseKeyResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\Action::make('bulkImport')
                ->label('Bulk Import')
                ->icon('heroicon-o-arrow-up-tray')
                ->url(fn () => LicenseKeyResource::getUrl('bulk-import')),

            Actions\CreateAction::make()
                ->label('Add Key'),
        ];
    }
}
