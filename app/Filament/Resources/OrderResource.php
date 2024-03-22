<?php

namespace App\Filament\Resources;

use App\Filament\Resources\OrderResource\Pages;
use App\Filament\Resources\OrderResource\RelationManagers;
use App\Models\Order;
use App\Models\Status;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class OrderResource extends Resource
{
    protected static ?string $model = Order::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
        ->schema([
            Forms\Components\TextInput::make('product_name')->label('Termék neve')->required(),
            Forms\Components\TextInput::make('quantity')->label('Mennyiség')
                ->required()
                ->numeric()
                ->minValue(0),
            Forms\Components\Select::make('status_id')
                ->required()
                ->label('Státusz')
                ->options(
                    Status::where('is_active', true)->pluck('name', 'id')->toArray()
                )
                ->placeholder('Válasszon státuszt'),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
        ->columns([
            Tables\Columns\TextColumn::make('id')
            ->label('OrderID'),
            Tables\Columns\TextColumn::make('status_id')
            ->label('StátuszID'),
            Tables\Columns\TextColumn::make('product_name')
            ->label('Termék neve'),
            Tables\Columns\TextColumn::make('quantity')
            ->label('Mennyiség'),
        ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ])
            ->emptyStateActions([
                Tables\Actions\CreateAction::make(),
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
            'index' => Pages\ListOrders::route('/'),
            'create' => Pages\CreateOrder::route('/create'),
            'edit' => Pages\EditOrder::route('/edit/{record}'),
        ];
    }
}
