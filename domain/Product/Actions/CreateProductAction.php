<?php

namespace Domain\Product\Actions;

use Domain\Product\DataTransferObjects\ProductData;
use Domain\Product\Models\Product;

class CreateProductAction
{
    public function execute(ProductData $productData): Product
    {
        return Product::create([
            'name' => $productData->name,
            'description' => $productData->description,
            'price' => $productData->price,
            'stock' => $productData->stock,
        ]);
    }
}
