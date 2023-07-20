<?php

namespace Domain\Product\DataTransferObjects;

final readonly class ProductData
{
    public function __construct(
        public string $name,
        public string $description,
        public int    $price,
        public int    $stock,
    )
    {
    }
}
