<?php

namespace App\Filament\Resources;

use App\Filament\Resources\LicenseKeyResource\Pages;
use App\Models\LicenseKey;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Collection;

class LicenseKeyResource extends Resource
{
    protected static ?string $model = LicenseKey::class;

    protected static ?string $navigationIcon = 'heroicon-o-key';

    protected static ?string $navigationGroup = 'Catalog';

    protected static ?string $navigationLabel = 'License Keys';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Select::make('product_id')
                    ->relationship('product', 'name')
                    ->required()
                    ->searchable()
                    ->preload(),

                TextInput::make('key_value')
                    ->label('License Key')
                    ->required()
                    ->maxLength(255)
                    ->unique(ignoreRecord: true),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('product.name')
                    ->searchable()
                    ->sortable(),

                Tables\Columns\TextColumn::make('key_value')
                    ->label('Key')
                    ->fontFamily('mono')
                    ->searchable()
                    ->copyable(),

                Tables\Columns\TextColumn::make('status')
                    ->badge()
                    ->color(fn (string $state) => $state === 'available' ? 'success' : 'gray'),

                Tables\Columns\TextColumn::make('order.id')
                    ->label('Order #')
                    ->placeholder('—'),

                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('product_id')
                    ->relationship('product', 'name')
                    ->label('Product'),

                Tables\Filters\SelectFilter::make('status')
                    ->options([
                        'available' => 'Available',
                        'used' => 'Used',
                    ]),
            ])
            ->actions([
                Tables\Actions\EditAction::make()
                    ->visible(fn (LicenseKey $record) => $record->status === 'available'),

                Tables\Actions\DeleteAction::make()
                    ->visible(fn (LicenseKey $record) => $record->status === 'available'),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make()
                        ->action(function (Collection $records) {
                            $records->where('status', 'available')->each->delete();
                        })
                        ->deselectRecordsAfterCompletion(),
                ]),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListLicenseKeys::route('/'),
            'create' => Pages\CreateLicenseKey::route('/create'),
            'edit' => Pages\EditLicenseKey::route('/{record}/edit'),
            'bulk-import' => Pages\BulkImportLicenseKeys::route('/bulk-import'),
        ];
    }
}
