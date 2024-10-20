<?php

namespace App\Filament\Resources;

use App\Filament\Resources\WatchCategoryResource\Pages;
use App\Models\WatchCategory;
use Filament\Forms\Components\Checkbox;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Placeholder;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Section;
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
use Illuminate\Support\Str;

class WatchCategoryResource extends Resource
{
    use Translatable;

    protected static ?string $model = WatchCategory::class;

    protected static ?string $slug = 'watch-categories';

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make()->schema([
                    TextInput::make('name')
                        ->required()
                        ->reactive()
                        ->afterStateUpdated(fn($state, callable $set) => $set('slug', Str::slug($state))),
                    TextInput::make('slug')
                        ->readOnly()
                        ->required()
                        ->unique(WatchCategory::class, 'slug', fn($record) => $record),
                    RichEditor::make('description')->columnSpan('full'),
                ])->columnSpan(2)->columns(2),
                Section::make()->schema([
                    Placeholder::make('created_at')
                        ->label('Created Date')
                        ->content(fn(?WatchCategory $record): string => $record?->created_at?->diffForHumans() ?? '-')
                        ->visibleOn('edit'),
                    Placeholder::make('updated_at')
                        ->label('Last Modified Date')
                        ->content(fn(?WatchCategory $record): string => $record?->updated_at?->diffForHumans() ?? '-')
                        ->visibleOn('edit'),
                    FileUpload::make('image')
                        ->image()
                        ->imageEditor()
                        ->columnSpan('full')
                        ->directory('uploads/images/categories'),
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

                TextColumn::make('description'),

                TextColumn::make('status'),

                ImageColumn::make('image'),
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
            'index' => Pages\ListWatchCategories::route('/'),
            'create' => Pages\CreateWatchCategory::route('/create'),
            'edit' => Pages\EditWatchCategory::route('/{record}/edit'),
        ];
    }

    public static function getGloballySearchableAttributes(): array
    {
        return ['name', 'slug'];
    }
}
