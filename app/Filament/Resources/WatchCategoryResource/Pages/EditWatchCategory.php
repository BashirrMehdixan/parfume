<?php

namespace App\Filament\Resources\WatchCategoryResource\Pages;

use App\Filament\Resources\WatchCategoryResource;
use Filament\Actions\DeleteAction;
use Filament\Actions\LocaleSwitcher;
use Filament\Resources\Pages\EditRecord;
use Filament\Resources\Pages\EditRecord\Concerns\Translatable;

class EditWatchCategory extends EditRecord
{
    use Translatable;

    protected static string $resource = WatchCategoryResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
            LocaleSwitcher::make(),
        ];
    }

    protected function getRedirectUrl(): string
    {
        return static::getResource()::getUrl('index');
    }
}
