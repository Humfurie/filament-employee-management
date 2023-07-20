<?php

namespace Domain\Product\Actions;

use Domain\Product\Models\Product;

class DeleteProductAction
{
    public function execute(Product $product): void
    {
        $product->delete();
    }
}
