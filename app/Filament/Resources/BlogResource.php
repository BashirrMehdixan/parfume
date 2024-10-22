<?php

namespace App\Filament\Resources;

use App\Filament\Resources\BlogResource\Pages;
use App\Models\Blog;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Placeholder;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Components\ToggleButtons;
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
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

class BlogResource extends Resource
{
    use Translatable;

    protected static ?string $model = Blog::class;

    protected static ?string $navigationParentItem = 'Blog Categories';

    protected static ?string $slug = 'blogs';

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

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
                        ->unique(Blog::class, 'slug->'.LaravelLocalization::getCurrentLocale(), fn($record) => $record),
                    Select::make('category_id')
                        ->relationship('category', 'title')
                        ->columnSpan('full')
                        ->searchable()
                        ->native(false)
                        ->required(),
                    RichEditor::make('description')
                        ->required()->columnSpan('full'),
                ])->columns(2)->columnSpan(2),
                Section::make()->schema([
                    Placeholder::make('created_at')
                        ->label('Created Date')
                        ->visibleOn('edit')
                        ->content(fn(?Blog $record): string => $record?->created_at?->diffForHumans() ?? '-'),
                    Placeholder::make('updated_at')
                        ->visibleOn('edit')
                        ->label('Last Modified Date')
                        ->content(fn(?Blog $record): string => $record?->updated_at?->diffForHumans() ?? '-'),
                    FileUpload::make('image')
                        ->image()
                        ->multiple()
                        ->imageEditor()
                        ->columnSpan('full')
                        ->panelLayout('grid')
                        ->reorderable()
                        ->directory('uploads/images/blogs')
                        ->required(),
                    ToggleButtons::make('status')->boolean()->grouped(),
                ])->columns(2)->columnSpan(1),
            ])->columns(3);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                ImageColumn::make('image')
                    ->stacked(),
                TextColumn::make('title')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('category.title')
                    ->searchable()
                    ->sortable(),
            ])->emptyStateIcon('heroicon-o-bookmark')
            ->emptyStateHeading('No blog found.')
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
            'index' => Pages\ListBlogs::route('/'),
            'create' => Pages\CreateBlog::route('/create'),
            'edit' => Pages\EditBlog::route('/{record}/edit'),
        ];
    }

    public static function getGlobalSearchEloquentQuery(): Builder
    {
        return parent::getGlobalSearchEloquentQuery()->with(['category']);
    }

    public static function getGloballySearchableAttributes(): array
    {
        return ['title', 'slug', 'category.title'];
    }

    public static function getGlobalSearchResultDetails(Model $record): array
    {
        $details = [];

        if ($record->category) {
            $details['Category'] = $record->category->title;
        }

        return $details;
    }
}
