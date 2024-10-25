<?php

namespace App\Filament\Resources;

use App\Filament\Resources\BlogCategoryResource\Pages;
use App\Models\BlogCategory;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Placeholder;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Components\ToggleButtons;
use Filament\Forms\Form;
use Filament\Resources\Concerns\Translatable;
use Filament\Resources\Resource;
use Filament\Tables\Actions\Action;
use Filament\Tables\Actions\BulkActionGroup;
use Filament\Tables\Actions\DeleteAction;
use Filament\Tables\Actions\DeleteBulkAction;
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ToggleColumn;
use Filament\Tables\Table;
use Illuminate\Support\Str;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

class BlogCategoryResource extends Resource
{
    use Translatable;

    protected static ?string $model = BlogCategory::class;
    protected static ?string $navigationLabel = 'Blog Categories';

    protected static ?string $slug = 'blog-categories';

    protected static ?string $navigationIcon = 'heroicon-o-chat-bubble-oval-left';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make()->schema([
                    TextInput::make('title')
                        ->required()
                        ->reactive()
                        ->live(true)
                        ->afterStateUpdated(fn($state, callable $set) => $set('slug', Str::slug($state))),
                    TextInput::make('slug')
                        ->readOnly()
                        ->required()
                        ->unique(BlogCategory::class, 'slug->'.session('locale'), fn($record) => $record),
                    RichEditor::make('description')->columnSpan('full'),
                ])->columns(2)->columnSpan(2),

                Section::make()->schema([
                    Placeholder::make('created_at')
                        ->label('Created Date')
                        ->visibleOn('edit')
                        ->content(fn(?BlogCategory $record): string => $record?->created_at?->diffForHumans() ?? '-'),
                    Placeholder::make('updated_at')
                        ->label('Last Modified Date')
                        ->visibleOn('edit')
                        ->content(fn(?BlogCategory $record): string => $record?->updated_at?->diffForHumans() ?? '-'),
                    FileUpload::make('image')
                        ->image()
                        ->imageEditor()
                        ->directory('uploads/images/blogs')
                        ->columnSpan('full'),
                    ToggleButtons::make('status')->boolean()->grouped(),

                ])->columns(2)->columnSpan(1)
            ])->columns(3);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                ImageColumn::make('image')->label(__('image')),
                TextColumn::make('title')->label(__('title'))
                    ->searchable()
                    ->sortable(),
                TextColumn::make('slug')
                    ->searchable()
                    ->sortable(),
                ToggleColumn::make('status')->label(__('status'))
            ])
            ->emptyStateIcon('heroicon-o-bookmark')
            ->emptyStateHeading('No blog categories found.')
            ->emptyStateDescription('You can create one by clicking the button below.')
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
            'index' => Pages\ListBlogCategories::route('/'),
            'create' => Pages\CreateBlogCategory::route('/create'),
            'edit' => Pages\EditBlogCategory::route('/{record}/edit'),
        ];
    }

    public static function getGloballySearchableAttributes(): array
    {
        return ['title', 'slug'];
    }
}
