<?php

declare(strict_types=1);

namespace Domain\Position\Actions;

use Domain\Position\DataTransferObjects\PositionData;
use Domain\Position\Models\Position;

class CreatePositionAction
{
    public function execute(PositionData $positionData): Position
    {
        return Position::create([
            'name' => $positionData->name,
        ]);
    }
}
