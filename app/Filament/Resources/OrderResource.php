<?php

namespace App\Filament\Resources;

use App\Filament\Resources\OrderResource\Pages;
use App\Models\Order;
use Filament\Infolists\Components\TextEntry;
use Filament\Infolists\Infolist;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class OrderResource extends Resource
{
    protected static ?string $model = Order::class;

    protected static ?string $navigationIcon = 'heroicon-o-shopping-bag';

    protected static ?string $navigationGroup = 'Sales';

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('id')
                    ->label('Order #')
                    ->sortable(),

                Tables\Columns\TextColumn::make('customer_email')
                    ->label('Customer')
                    ->searchable(),

                Tables\Columns\TextColumn::make('product.name')
                    ->searchable()
                    ->sortable(),

                Tables\Columns\TextColumn::make('status')
                    ->badge()
                    ->color(fn (string $state) => match ($state) {
                        'fulfilled' => 'success',
                        'paid' => 'warning',
                        'failed' => 'danger',
                        default => 'gray',
                    }),

                Tables\Columns\TextColumn::make('amount')
                    ->label('Amount')
                    ->formatStateUsing(fn (int $state, Order $record) => number_format($state / 100, 2).' '.strtoupper($record->currency)),

                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable(),
            ])
            ->defaultSort('created_at', 'desc')
            ->filters([
                Tables\Filters\SelectFilter::make('status')
                    ->options([
                        'pending' => 'Pending',
                        'paid' => 'Paid',
                        'fulfilled' => 'Fulfilled',
                        'failed' => 'Failed',
                    ]),
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
            ]);
    }

    public static function infolist(Infolist $infolist): Infolist
    {
        return $infolist
            ->schema([
                TextEntry::make('id')->label('Order #'),
                TextEntry::make('customer_email')->label('Customer'),
                TextEntry::make('product.name')->label('Product'),
                TextEntry::make('licenseKey.key_value')->label('License Key')->placeholder('Not yet assigned'),
                TextEntry::make('status')->badge(),
                TextEntry::make('amount')->formatStateUsing(fn (int $state, Order $record) => number_format($state / 100, 2).' '.strtoupper($record->currency)),
                TextEntry::make('stripe_session_id')->label('Stripe Session ID')->placeholder('—'),
                TextEntry::make('stripe_payment_intent_id')->label('Stripe Payment Intent ID')->placeholder('—'),
                TextEntry::make('created_at')->dateTime(),
            ]);
    }

    public static function canCreate(): bool
    {
        return false;
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListOrders::route('/'),
            'view' => Pages\ViewOrder::route('/{record}'),
        ];
    }
}
