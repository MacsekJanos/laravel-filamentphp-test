<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ItemResource\Pages;
use App\Filament\Resources\ItemResource\RelationManagers;
use App\Models\Item;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\ColorPicker;




class ItemResource extends Resource
{
    protected static ?string $model = Item::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
        ->schema([
            Forms\Components\TextInput::make('name')
            ->required()
            ->label('Név'),
            Select::make('condition')
            ->options([
                    'új' => 'Új',
                    'használt' => 'Használt',
                ])
            ->required()
            ->label('Állapot'),
            ColorPicker::make('color')
            ->required()
            ->label('Szín'),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('id')
                ->label('ID'),
                Tables\Columns\TextColumn::make('name')
                ->label('Név'),
                Tables\Columns\TextColumn::make('condition')
                ->label('Állapot'),
                Tables\Columns\TextColumn::make('color')
                ->label('Szín'),
            ])
            ->filters([
                
            ])
            ->actions([
                Tables\Actions\EditAction::make()
                ->label('Szerkesztés'),
                Tables\Actions\DeleteAction::make()
                ->label('Törlés'),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make()
                    ->label('Törlés'),
                ])
                ->label('Törlés'),
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
            'index' => Pages\ListItems::route('/'),
            'create' => Pages\CreateItem::route('/create'),
            'edit' => Pages\EditItem::route('/{record}/edit'),
        ];
    }    
}
