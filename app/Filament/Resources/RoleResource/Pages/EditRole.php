<?php

namespace App\Filament\Resources\RoleResource\Pages;

use App\Filament\Resources\RoleResource;
use Domain\Role\Actions\UpdateRoleAction;
use Domain\Role\DataTransferObjects\RoleData;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class EditRole extends EditRecord
{
    protected static string $resource = RoleResource::class;

    protected function getActions(): array
    {
        return [
            Actions\ViewAction::make(),
            Actions\DeleteAction::make(),
        ];
    }

    protected function handleRecordUpdate(Model $record, array $data): Model
    {
        $record = DB::transaction(
            fn () => app(UpdateRoleAction::class)->execute(
                $record,
                new RoleData(
                    name: $data['name'],
                )
            )
        );

        return $record;
    }
}
