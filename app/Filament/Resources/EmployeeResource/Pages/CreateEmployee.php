<?php

namespace App\Filament\Resources\EmployeeResource\Pages;

use App\Filament\Resources\EmployeeResource;
use Domain\Employee\Actions\CreateEmployeeAction;
use Domain\Employee\DataTransferObjects\EmployeeData;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class CreateEmployee extends CreateRecord
{
    protected static string $resource = EmployeeResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }

    protected function handleRecordCreation(array $data): Model
    {
        return DB::transaction(fn () => app(CreateEmployeeAction::class)->execute(
            new EmployeeData(
                position_id: $data['position_id'],
                first_name: $data['first_name'],
                middle_name: $data['middle_name'],
                last_name: $data['last_name'],
            )
        ));
    }
}
