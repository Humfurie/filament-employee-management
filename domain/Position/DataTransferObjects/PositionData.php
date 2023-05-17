<?php

declare(strict_types=1);

namespace Domain\Position\DataTransferObjects;

final readonly class PositionData
{
    public function __construct(public string $name)
    {

    }
}
