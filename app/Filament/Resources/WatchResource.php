<?php

namespace App\Filament\Resources;

use App\Filament\Resources\WatchResource\Pages;
use App\Models\Watch;
use Filament\Forms\Components\Checkbox;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Placeholder;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Form;
use Filament\Resources\Concerns\Translatable;
use Filament\Resources\Resource;
use Filament\Tables\Actions\BulkActionGroup;
use Filament\Tables\Actions\DeleteAction;
use Filament\Tables\Actions\DeleteBulkAction;
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class WatchResource extends Resource
{
    use Translatable;

    protected static ?string $model = Watch::class;

    protected static ?string $slug = 'watches';

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make()->schema([
                    TextInput::make('name')
                        ->required()
                        ->reactive()
                        ->live(true)
                        ->afterStateUpdated(fn($state, callable $set) => $set('slug', Str::slug($state))),
                    TextInput::make('slug')
                        ->readOnly()
                        ->required()
                        ->unique(Watch::class, 'slug', fn($record) => $record),
                    Select::make('category_id')
                        ->relationship('category', 'name')
                        ->native(false)
                        ->searchable()
                        ->required(),
                    Select::make('gender')
                        ->options([
                            'male' => 'Male',
                            'female' => 'Female',
                            'unisex' => 'Unisex',
                        ])
                        ->required(),
                    TextInput::make('price')
                        ->required()
                        ->numeric(),
                    TextInput::make('discount')
                        ->numeric(),
                    RichEditor::make('description')->columnSpan('full'),
                ])->columnSpan(2)->columns(2),
                Section::make()->schema([
                    Placeholder::make('created_at')
                        ->label('Created Date')
                        ->content(fn(?Watch $record): string => $record?->created_at?->diffForHumans() ?? '-')
                        ->visibleOn('edit'),
                    Placeholder::make('updated_at')
                        ->label('Last Modified Date')
                        ->content(fn(?Watch $record): string => $record?->updated_at?->diffForHumans() ?? '-')
                        ->visibleOn('edit'),
                    FileUpload::make('image')
                        ->image()
                        ->imageEditor()
                        ->multiple()
                        ->directory('uploads/images/products')
                        ->required()
                        ->columnSpan('full'),
                    Toggle::make('special_offer'),
                    Toggle::make('best_selling'),
                    Toggle::make('status'),
                ])->columnSpan(1)->columns(2),

            ])->columns(3);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('slug')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('category.name')
                    ->searchable()
                    ->sortable(),

                ImageColumn::make('image'),

                TextColumn::make('gender'),

                TextColumn::make('price'),

                TextColumn::make('discount'),

                TextColumn::make('special_offer'),

                TextColumn::make('best_selling'),

                TextColumn::make('status'),
            ])
            ->filters([
                //
            ])
            ->actions([
                EditAction::make(),
                DeleteAction::make(),
            ])
            ->bulkActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListWatches::route('/'),
            'create' => Pages\CreateWatch::route('/create'),
            'edit' => Pages\EditWatch::route('/{record}/edit'),
        ];
    }

    public static function getGlobalSearchEloquentQuery(): Builder
    {
        return parent::getGlobalSearchEloquentQuery()->with(['category']);
    }

    public static function getGloballySearchableAttributes(): array
    {
        return ['name', 'slug', 'category.name'];
    }

    public static function getGlobalSearchResultDetails(Model $record): array
    {
        $details = [];

        if ($record->category) {
            $details['Category'] = $record->category->name;
        }

        return $details;
    }
}
