<?php

namespace App\Filament\Resources\AboutResource\Pages;

use App\Filament\Resources\AboutResource;
use Filament\Actions\CreateAction;
use Filament\Actions\LocaleSwitcher;
use Filament\Resources\Pages\ListRecords\Concerns\Translatable;
use Filament\Resources\Pages\ListRecords;

class ListAbouts extends ListRecords
{
    use Translatable;

    protected static string $resource = AboutResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
            LocaleSwitcher::make()
        ];
    }
}
