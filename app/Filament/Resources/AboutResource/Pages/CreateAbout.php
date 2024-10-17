<?php

namespace App\Filament\Resources\AboutResource\Pages;

use App\Filament\Resources\AboutResource;
use Filament\Actions\LocaleSwitcher;
use Filament\Resources\Pages\CreateRecord;
use Filament\Resources\Pages\CreateRecord\Concerns\Translatable;

class CreateAbout extends CreateRecord
{
    use Translatable;

    protected static string $resource = AboutResource::class;

    protected function getHeaderActions(): array
    {
        return [
            LocaleSwitcher::make()
        ];
    }
}
