<?php

namespace App\Filament\Resources;

use App\Filament\Resources\OrderResource\Pages;
use App\Filament\Resources\OrderResource\RelationManagers;
use App\Models\Order;
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

    protected static ?string $navigationIcon = 'heroicon-o-shopping-cart';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
            Forms\Components\TextInput::make('total')
                ->label('Total')
                ->required()
                ->numeric(),
            Forms\Components\TextInput::make('full_name')
                ->label('Nom complet')
                ->required()
                ->maxLength(255),
            Forms\Components\TextInput::make('city')
                ->label('Ville')
                ->required()
                ->maxLength(255),
            Forms\Components\TextInput::make('phone')
                ->label('Téléphone')
                ->tel()
                ->required()
                ->maxLength(255),
            Forms\Components\TextInput::make('email')
                ->label('Email')
                ->required()
                ->maxLength(255),
            Forms\Components\Select::make('status')
                ->label('Statut')
                ->options([
                    'En attente' => 'En attente',
                    'Confirmé' => 'Confirmé',
                    'Livré' => 'Livré',
                    'Annulé' => 'Annulé',
                    'Retourné' => 'Retourné'
                ])
                ->required(),
            Forms\Components\Textarea::make('address')
                ->label('Adresse')
                ->required()
                ->columnSpanFull(),

            Forms\Components\Repeater::make('orderItems')
                ->relationship('orderItems')
                ->schema([
                    Forms\Components\Select::make('product_id')
                        ->label('Produit')
                        ->relationship('product', 'name')
                        ->required(),
                    Forms\Components\TextInput::make('quantity')
                        ->label('Quantité')
                        ->numeric()
                        ->required()
                        ->minValue(1),
                ])
                ->label('Articles de la commande')

            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
            Tables\Columns\TextColumn::make('total')
                ->label('Total')
                ->suffix(" MAD")
                ->numeric()
                ->sortable(),
            Tables\Columns\TextColumn::make('full_name')
                ->label('Nom complet')
                ->searchable(),
            Tables\Columns\TextColumn::make('city')
                ->label('Ville')
                ->searchable(),
            Tables\Columns\TextColumn::make('phone')
                ->label('Téléphone')
                ->searchable(),
            Tables\Columns\TextColumn::make('email')
                ->label('Email')
                ->searchable(),
            Tables\Columns\TextColumn::make('status')
                ->badge()
                ->label('Statut'),
            Tables\Columns\TextColumn::make('created_at')
                ->label('Créé le')
                ->dateTime()
                ->sortable()
                ->toggleable(isToggledHiddenByDefault: true),
            Tables\Columns\TextColumn::make('updated_at')
                ->label('Mis à jour le')
                ->dateTime()
                ->sortable()
                ->toggleable(isToggledHiddenByDefault: true),
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
            'edit' => Pages\EditOrder::route('/{record}/edit'),
        ];
    }
}
