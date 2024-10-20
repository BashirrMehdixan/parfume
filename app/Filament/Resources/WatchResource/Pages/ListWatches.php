<?php

namespace App\Filament\Resources\WatchResource\Pages;

use App\Filament\Resources\WatchResource;
use Filament\Actions\CreateAction;
use Filament\Actions\LocaleSwitcher;
use Filament\Resources\Pages\ListRecords;
use Filament\Resources\Pages\ListRecords\Concerns\Translatable;

class ListWatches extends ListRecords
{
    use Translatable;

    protected static string $resource = WatchResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
            LocaleSwitcher::make()
        ];
    }
}
