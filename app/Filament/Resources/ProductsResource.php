<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ProductsResource\Pages;
use App\Filament\Resources\ProductsResource\RelationManagers;
use App\Models\Product;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\MarkdownEditor;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Form;
use Filament\Forms\Set;
use Filament\Resources\Resource;
use Filament\Tables\Actions\BulkActionGroup;
use Filament\Tables\Actions\DeleteBulkAction;
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ToggleColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Str;

class ProductsResource extends Resource
{
    protected static ?string $model = Product::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make([
                    TextInput::make('name')
                        ->live(onBlur: true)
                        ->afterStateUpdated(fn(Set $set, ?string $state) => $set('slug', Str::slug($state)))
                        ->required(),
                    TextInput::make('slug')
                        ->readOnly()
                        ->unique(ignoreRecord: true)
                        ->readOnly()
                        ->required(),
                    Select::make('brand_id')
                        ->relationship('brand', 'name')
                        ->required(),
                    Select::make('gender')
                        ->options([
                            "male" => "Male",
                            "female" => "Female",
                            "unisex" => "Unisex",
                        ])->default('unisex'),
                    Textinput::make('price')
                        ->required(),
                    TextInput::make('discount'),
                    TextInput::make('quantity')
                        ->required(),
                    MarkdownEditor::make('description')
                        ->columnSpan('full')
                ])
                    ->columns(2)
                    ->columnSpan(2),
                Section::make()
                    ->schema([
                        FileUpload::make('image')
                            ->image()
                            ->multiple()
                            ->imageEditor()
                            ->directory('uploads/products')
                            ->columnSpan('full')
                            ->required(),
                        Toggle::make('status'),
                        Toggle::make('special_offer'),
                        Toggle::make('best_selling'),
                    ])
                    ->columns(2)
                    ->columnSpan(1)
            ])->columns(3);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                ImageColumn::make('image')
                    ->label('Image'),
                TextColumn::make('name')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('brand.name')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('price')
                    ->searchable()
                    ->sortable(),
                ToggleColumn::make('status')
                    ->sortable(),
                ToggleColumn::make('special_offer')
                    ->sortable(),
                ToggleColumn::make('best_selling')
                    ->sortable(),
                TextColumn::make('created_at')
                    ->sortable(),
            ])
            ->filters([
                //
            ])
            ->actions([
                EditAction::make(),
            ])
            ->bulkActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
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
            'create' => Pages\CreateProducts::route('/create'),
            'edit' => Pages\EditProducts::route('/{record}/edit'),
        ];
    }
}
