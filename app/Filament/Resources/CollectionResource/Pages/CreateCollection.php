<?php

namespace App\Filament\Resources\CollectionResource\Pages;

use App\Filament\Resources\CollectionResource;
use Filament\Actions\LocaleSwitcher;
use Filament\Resources\Pages\CreateRecord;
use Filament\Resources\Pages\CreateRecord\Concerns\Translatable;

class CreateCollection extends CreateRecord
{
    use Translatable;

    protected static string $resource = CollectionResource::class;

    public function getHeaderActions(): array
    {
        return [
            LocaleSwitcher::make()
        ];
    }
}
