<?php

namespace App\Filament\Resources;

use App\Filament\Resources\StatusResource\Pages;
use App\Filament\Resources\StatusResource\RelationManagers;
use App\Models\Status;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Filters\TernaryFilter;


class StatusResource extends Resource
{
    protected static ?string $model = Status::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                ->label('Név')->required(),
                Forms\Components\Toggle::make('is_active')->label('Aktivitás')->required(),
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
            Tables\Columns\IconColumn::make('is_active')
            ->label('Aktivitás')
            ->boolean()
        ])
                
            
            ->filters([
                TernaryFilter::make('is_active')
                ->label('Aktivitás')
                ->trueLabel('Aktív')
                ->falseLabel('Inaktív')
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
            'index' => Pages\ListStatuses::route('/'),
            'create' => Pages\CreateStatus::route('/create'),
            'edit' => Pages\EditStatus::route('/{record}/edit'),
        ];
    }    
}
