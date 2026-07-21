<?php

namespace App\Filament\Resources\LicenseKeyResource\Pages;

use App\Filament\Resources\LicenseKeyResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditLicenseKey extends EditRecord
{
    protected static string $resource = LicenseKeyResource::class;

    public function mount($record): void
    {
        parent::mount($record);

        abort_unless($this->record->status === 'available', 403, 'Sold keys cannot be edited.');
    }

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make()
                ->visible(fn () => $this->record->status === 'available'),
        ];
    }
}
