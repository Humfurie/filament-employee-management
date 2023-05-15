<?php

namespace App\Filament\Resources\PositionResource\Pages;

use Filament\Resources\Pages\ViewRecord;
use App\Filament\Resources\PositionResource;
use Filament\Pages\Actions;

class ViewPosition extends ViewRecord
{
    protected static string $resource = PositionResource::class;

    protected function getActions(): array
    {
        return [
            Actions\EditAction::make(),
        ];
    }
}
