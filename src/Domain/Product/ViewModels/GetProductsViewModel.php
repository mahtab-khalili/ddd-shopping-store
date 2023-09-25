<?php

namespace Domain\Product\ViewModels;

use Domain\Product\Models\Product;
use Domain\Shared\ViewModels\ViewModel;
use Illuminate\Pagination\Paginator;

class GetProductsViewModel extends ViewModel
{
    private const PER_PAGE = 5;

    public function __construct(private readonly int $currentPage)
    {}

    public function products(): Paginator
    {
        $products = Product::get()
        ->map
        ->getData();

        return pagination(
            $products,
            $this->currentPage,
            self::PER_PAGE
        );
    }

    public function total(): int
    {
        return Product::count();
    }
}