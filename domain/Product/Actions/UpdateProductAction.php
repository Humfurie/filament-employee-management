<?php

namespace Domain\Product\Actions;

use Domain\Product\DataTransferObjects\ProductData;
use Domain\Product\Models\Product;

class UpdateProductAction
{
    public function execute(Product $product, ProductData $productData): Product
    {
        $product->update([
            'name' => $productData->name,
            'description' => $productData->description,
            'price' => $productData->price,
            'stock' => $productData->stock,
        ]);

        return $product;
    }
}
