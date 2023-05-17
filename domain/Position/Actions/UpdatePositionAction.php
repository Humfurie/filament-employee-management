<?php

declare(strict_types=1);

namespace Domain\Position\Actions;

use Domain\Position\DataTransferObjects\PositionData;
use Domain\Position\Models\Position;

class UpdatePositionAction
{
    public function execute(Position $position, PositionData $positionData): Position
    {
        $position->update([
            'name' => $positionData->name,
        ]);

        return $position;
    }
}
