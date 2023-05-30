<?php

declare(strict_types=1);

namespace App\Filament\Resources\EmployeeResource\Pages;

use App\Filament\Resources\EmployeeResource;
use Domain\Employee\Actions\DeleteEmployeeAction;
use Domain\Employee\Actions\ForceDeleteEmployeeAction;
use Domain\Employee\Actions\RestoreEmployeeAction;
use Domain\Employee\Actions\UpdateEmployeeAction;
use Domain\Employee\DataTransferObjects\EmployeeData;
use Domain\Employee\Models\Employee;
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
            Actions\DeleteAction::make()
                ->using(fn (Employee $record) => DB::transaction(fn () => app(DeleteEmployeeAction::class)->execute($record))),
            Actions\ForceDeleteAction::make()
                ->using(fn (Employee $record) => DB::transaction(fn () => app(ForceDeleteEmployeeAction::class)->execute($record))),
            Actions\RestoreAction::make()
                ->using(fn (Employee $record) => DB::transaction(fn () => app(RestoreEmployeeAction::class)->execute($record))),
        ];
    }

    protected function handleRecordUpdate(Model $record, array $data): Model
    {
        $editEmployee = DB::transaction(fn () => app(UpdateEmployeeAction::class)->execute(
            $record,
            new EmployeeData(
                user_id: (int) auth()->user()->id,
                position_id: (int) $data['position_id'],
                first_name: $data['first_name'],
                middle_name: $data['middle_name'],
                last_name: $data['last_name'],
            )
        ));

        return $editEmployee;
    }
}
