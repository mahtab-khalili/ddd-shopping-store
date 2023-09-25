<?php

namespace App\Http\Api\Controllers\Product;

use App\Http\Api\Controllers\Controller;
use Domain\Product\Actions\DeleteProductAction;
use Domain\Product\Actions\UpsertProductAction;
use Domain\Product\DataTransferObjects\ProductData;
use Domain\Product\Models\Product;
use Domain\Product\ViewModels\GetProductsViewModel;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function store(ProductData $data)
    {

        $product = UpsertProductAction::execute($data);

        return responseApi(
            'success',
            trans('product.create_successfully'),
            $product,
            201
        );
    }

    public function update(ProductData $data)
    {
        $product = UpsertProductAction::execute($data);

        return responseApi(
            'success',
            trans('product.update_successfully'),
            $product,
            200
        );
    }

    public function index(Request $request)
    {
        $products = new GetProductsViewModel($request->get('page', 1));

        return responseApi(
            'success',
            null,
            $products->toArray(),
        );
    }

    public function show(Product $product)
    {
        return responseApi(
            'success',
            null,
            ProductData::from($product)->toArray()
        );
    }

    public function destroy(Product $product)
    {
        DeleteProductAction::execute($product);

        return responseApi(
            'success',
            'product deleted successfully',
        );
    }
}