<?php

namespace Domain\Product\Models;

use Domain\Product\DataTransferObjects\ProductData;
use Domain\Shared\Models\BaseModel;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Spatie\LaravelData\WithData;

class Product extends BaseModel
{
    use HasFactory;
    use WithData;

    protected $fillable = [
        'title',
        'description',
        'price',
        'image',
        'stock'
    ];
    
    protected $dataClass = ProductData::class;
}
