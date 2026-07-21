<?php

namespace App\Filament\Resources\LicenseKeyResource\Pages;

use App\Filament\Resources\LicenseKeyResource;
use App\Models\Product;
use App\Services\LicenseKeyService;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Forms\Form;
use Filament\Notifications\Notification;
use Filament\Resources\Pages\Page;

class BulkImportLicenseKeys extends Page implements HasForms
{
    use InteractsWithForms;

    protected static string $resource = LicenseKeyResource::class;

    protected static string $view = 'filament.resources.license-key-resource.pages.bulk-import-license-keys';

    protected static ?string $title = 'Bulk Import Keys';

    public ?array $data = [];

    public function mount(): void
    {
        $this->form->fill();
    }

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Select::make('product_id')
                    ->label('Product')
                    ->options(fn () => Product::query()->orderBy('name')->pluck('name', 'id'))
                    ->required()
                    ->searchable(),

                Textarea::make('keys')
                    ->label('License Keys')
                    ->helperText('Paste one license key per line. Blank lines and duplicates are ignored automatically.')
                    ->required()
                    ->rows(15),
            ])
            ->statePath('data');
    }

    public function import(LicenseKeyService $service): void
    {
        $state = $this->form->getState();

        $product = Product::findOrFail($state['product_id']);
        $count = $service->bulkImport($product, $state['keys']);

        Notification::make()
            ->title($count > 0
                ? "Imported {$count} new key(s) for {$product->name}."
                : 'No new keys were imported (all lines were blank or already existed).')
            ->success()
            ->send();

        $this->form->fill(['product_id' => $product->id]);
    }
}
