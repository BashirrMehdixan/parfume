<?php

namespace App\Filament\Resources\WatchResource\Pages;

use App\Filament\Resources\WatchResource;
use Filament\Actions\LocaleSwitcher;
use Filament\Resources\Pages\CreateRecord;
use Filament\Resources\Pages\CreateRecord\Concerns\Translatable;

class CreateWatch extends CreateRecord
{
    use Translatable;

    protected static string $resource = WatchResource::class;

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
