<?php

namespace Domain\Product\DataTransferObjects;

use Spatie\LaravelData\Attributes\FromRouteParameter;
use Spatie\LaravelData\Attributes\FromRouteParameterProperty;
use Spatie\LaravelData\Data;

class ProductData extends Data
{

    #[FromRouteParameter('product')]
    public ?int $id;
    public string $title;
    public string $description;
    public int $price;
    public string $image;
    public int $stock;

    public static function rules(): array
    {
        return [
            'title' => ['required', 'string'],
            'description' => ['required', 'string'],
            'price' => ['required', 'numeric'],
            'image' => ['required'],
            'stock' => ['required', 'numeric'],
        ];
    }
}