<?php

namespace App\Filament\Resources;

use App\Filament\Resources\UserResource\Pages;
use App\Filament\Resources\UserResource\RelationManagers;
use App\Models\User;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\ToggleButtons;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables\Actions\BulkActionGroup;
use Filament\Tables\Actions\DeleteAction;
use Filament\Tables\Actions\DeleteBulkAction;
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class UserResource extends Resource
{
    protected static ?string $model = User::class;

    protected static ?string $navigationIcon = 'heroicon-o-user';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make()->schema([
                    TextInput::make('firstname'),
                    TextInput::make('lastname'),
                    TextInput::make('name')->required()->unique(ignoreRecord: true),
                    TextInput::make('email')->required()->email()->unique(ignoreRecord: true),
                    Select::make('gender')->options([
                        'female' => 'Female',
                        'male' => 'Male',
                    ])->native(false)->default('female'),
                    Select::make('role_id')->options([
                        0 => 'Super admin',
                        1 => 'Admin',
                        2 => 'User',
                    ])->native(false)->default(2),
                    DatePicker::make('birthdate')->native(false),
                    TextInput::make('password')->required()->password(),

                ])->columns(2)->columnSpan(2),
                Section::make()->schema([
                    FileUpload::make('avatar')->image()->imageEditor(),
                    ToggleButtons::make('status')->boolean()->grouped()
                ])->columnSpan(1)
            ])->columns(3);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                ImageColumn::make('avatar')->circular(),
                TextColumn::make('firstname'),
                TextColumn::make('lastname'),
                TextColumn::make('name'),
                TextColumn::make('role_id')->formatStateUsing(function ($state) {
                    return $state == 0 ? 'Super admin' : ($state == 1 ? 'Admin' : 'User');
                })
                    ->badge()
                    ->color(fn(string $state): string => match ($state) {
                        '0' => 'success',
                        '1' => 'warning',
                        '2' => 'danger',
                    })
            ])
            ->filters([
                //
            ])
            ->actions([
                EditAction::make(),
                DeleteAction::make()
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
            'index' => Pages\ListUsers::route('/'),
            'create' => Pages\CreateUser::route('/create'),
            'edit' => Pages\EditUser::route('/{record}/edit'),
        ];
    }
}
