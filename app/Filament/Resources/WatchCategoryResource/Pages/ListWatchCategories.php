<?php

namespace App\Filament\Resources\WatchCategoryResource\Pages;

use App\Filament\Resources\WatchCategoryResource;
use Filament\Actions\CreateAction;
use Filament\Actions\LocaleSwitcher;
use Filament\Resources\Pages\ListRecords;
use Filament\Resources\Pages\ListRecords\Concerns\Translatable;

class ListWatchCategories extends ListRecords
{
    use Translatable;

    protected static string $resource = WatchCategoryResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
            LocaleSwitcher::make()
        ];
    }
}
