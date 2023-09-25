<?php

namespace Domain\Product\Actions;

use Domain\Product\DataTransferObjects\ProductData;
use Domain\Product\Models\Product;

class UpsertProductAction
{

    public static function execute( ProductData $data)
    {
        $product = Product::updateOrCreate(
            [
                'id' => $data->id,
            ],
            [
                ...$data->all()
            ]
            );

            return $product->toArray();
    }
    
}