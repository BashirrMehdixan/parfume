<?php

namespace App\Filament\Resources\ProductsResource\Pages;

use App\Filament\Resources\ProductsResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditProducts extends EditRecord
{
    use EditRecord\Concerns\Translatable;
    protected static string $resource = ProductsResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
            Actions\LocaleSwitcher::make()
        ];
    }
}
