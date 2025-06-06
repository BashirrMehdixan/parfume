<?php

namespace App\Filament\Resources\BlogResource\Pages;

use App\Filament\Resources\BlogResource;
use Filament\Actions\DeleteAction;
use Filament\Actions\LocaleSwitcher;
use Filament\Resources\Pages\EditRecord;
use Filament\Resources\Pages\EditRecord\Concerns\Translatable;

class EditBlog extends EditRecord
{
    use Translatable;

    protected static string $resource = BlogResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
            LocaleSwitcher::make()
        ];
    }

    protected function getRedirectUrl(): string
    {
        return static::getResource()::getUrl('index');
    }
}
