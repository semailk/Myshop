<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\Shop\ShopProduct\StoreShopProductRequest;
use App\Http\Requests\Shop\ShopProduct\UpdateShopProductRequest;
use App\Models\Shop\ShopProduct;
use App\Repositories\Shop\ShopProductRepository;
use App\Services\ApiServise\ShopProductService;

class ShopProductsController extends ApiController
{
    public $productRepository;

    public $shopProductService;

    public function __construct(ShopProductRepository $productRepository, ShopProductService $productService)
    {
        $this->productRepository = $productRepository;
        $this->shopProductService = $productService;
    }

    public function index(ShopProduct $shopProduct)
    {
        $this->shopProductService->testForEmptiness($shopProduct);
        return response()->json($this->productRepository->getAll(), 200);
    }

    public function edit($id)
    {
        if (!$this->productRepository->getById($id)) {
            return $this->shopProductService->checkOnId();
        }
        return response($this->productRepository->getById($id), 200);
    }

    public function store(StoreShopProductRequest $request)
    {
        $this->productRepository->createProduct($request->input());
        return response()->json($this->productRepository->getall(), 200);
    }

    public function destroy($id)
    {
        $this->productRepository->getById($id)->delete();
        return response()->json('', 204);
    }

    public function update(UpdateShopProductRequest $request, $id)
    {
        $this->productRepository->getById($id)->update($request->input());
        return response()->json($this->productRepository->getById($id), 200);
    }
}
