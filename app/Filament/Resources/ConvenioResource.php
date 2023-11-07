<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ConvenioResource\Pages;
use App\Filament\Resources\ConvenioResource\RelationManagers;
use App\Models\Convenio;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ConvenioResource extends Resource
{
    protected static ?string $model = Convenio::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('de'),
                Forms\Components\TextInput::make('para'),
                //
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('de')->searchable()->sortable(),
                Tables\Columns\TextColumn::make('para')->searchable()->sortable()
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
            'index' => Pages\ListConvenios::route('/'),
            'create' => Pages\CreateConvenio::route('/create'),
            'edit' => Pages\EditConvenio::route('/{record}/edit'),
        ];
    }    
}
