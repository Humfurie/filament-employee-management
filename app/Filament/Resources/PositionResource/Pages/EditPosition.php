<?php

namespace App\Filament\Resources\PositionResource\Pages;

use App\Filament\Resources\PositionResource;
use Domain\Position\Actions\UpdatePositionAction;
use Domain\Position\DataTransferObjects\PositionData;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class EditPosition extends EditRecord
{
    protected static string $resource = PositionResource::class;

    protected function getActions(): array
    {
        return [
            Actions\DeleteAction::make(),
            Actions\ForceDeleteAction::make(),
            Actions\RestoreAction::make(),
        ];
    }

    protected function handleRecordUpdate(Model $record, array $data): Model
    {
        $editPosition = DB::transaction(
            fn () => app(UpdatePositionAction::class)->execute(
                $record,
                new PositionData(
                    name: $data['name'],
                )
            )
        );
        return $editPosition;
    }
}
