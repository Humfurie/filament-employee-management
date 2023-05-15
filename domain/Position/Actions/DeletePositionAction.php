<?php

namespace Domain\Position\Actions;

use Domain\Position\Models\Position;

class DeletePositionAction
{
    public function execute(Position $position): void
    {
        $position->delete();
    }
}
