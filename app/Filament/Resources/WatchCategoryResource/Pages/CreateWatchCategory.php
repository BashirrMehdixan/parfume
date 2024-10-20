<?php

namespace App\Filament\Resources\WatchCategoryResource\Pages;

use App\Filament\Resources\WatchCategoryResource;
use Filament\Actions\LocaleSwitcher;
use Filament\Resources\Pages\CreateRecord;
use Filament\Resources\Pages\CreateRecord\Concerns\Translatable;

class CreateWatchCategory extends CreateRecord
{
    use Translatable;

    protected static string $resource = WatchCategoryResource::class;

    protected function getHeaderActions(): array
    {
        return [
            LocaleSwitcher::make(),
        ];
    }

    protected function getRedirectUrl(): string
    {
        return static::getResource()::getUrl('index');
    }
}
