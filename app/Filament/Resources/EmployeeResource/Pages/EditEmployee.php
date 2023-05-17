<?php

namespace App\Filament\Resources\EmployeeResource\Pages;

use App\Filament\Resources\EmployeeResource;
use Domain\Employee\Actions\UpdateEmployeeAction;
use Domain\Employee\DataTransferObjects\EmployeeData;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class EditEmployee extends EditRecord
{
    protected static string $resource = EmployeeResource::class;

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
        $editEmployee = DB::transaction(fn () => app(UpdateEmployeeAction::class)->execute(
            $record,
            new EmployeeData(
                position_id: $data['position_id'],
                first_name: $data['first_name'],
                middle_name: $data['middle_name'],
                last_name: $data['last_name'],
            )
            ));

        return $editEmployee;
    }
}
