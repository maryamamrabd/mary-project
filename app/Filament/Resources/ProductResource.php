<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ProductResource\Pages;
use App\Filament\Resources\ProductResource\RelationManagers;
use App\Models\Product;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ProductResource extends Resource
{
    protected static ?string $model = Product::class;

    protected static ?string $navigationIcon = 'heroicon-o-archive-box';

    public static function getModelLabel(): string
    {
        return "Produits";
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make()
                    ->schema([
                        Forms\Components\TextInput::make('name')
                            ->required()
                            ->label("Produit")
                            ->maxLength(255),
                        Forms\Components\Select::make('category_id')
                            ->label("Categorie")
                            ->relationship('category', 'name')
                            ->required(),
                        Forms\Components\TextInput::make('price')
                            ->label("Prix")
                            ->required()
                            ->numeric()
                            ->prefix(' MAD'),
                        Forms\Components\Textarea::make('description')
                            ->required()
                            ->columnSpanFull(),
                        Forms\Components\RichEditor::make('content')
                            ->required()
                            ->columnSpanFull(),
                    ])->columns(2),

                Forms\Components\Repeater::make('images')
                    ->relationship('images')
                    ->grid(3)
                    ->schema([
                        Forms\Components\FileUpload::make('path')
                            ->label("Image")
                            ->image()
                            ->columnSpan(1)
                            ->required(),
                    ])->columnSpanFull()

            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->label("Produit")
                    ->searchable(),

                Tables\Columns\TextColumn::make('category.name')
                    ->label("Categorie")
                    // ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('price')
                    ->label("Prix")
                    ->money( "MAD ")
                    ->sortable(),
                Tables\Columns\TextColumn::make('user.full_name')
                    ->label("Créé par")
                    ->numeric()
                    ->sortable(),
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
            'index' => Pages\ListProducts::route('/'),
            'create' => Pages\CreateProduct::route('/create'),
            'edit' => Pages\EditProduct::route('/{record}/edit'),
        ];
    }
}
