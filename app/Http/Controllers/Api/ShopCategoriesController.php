<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\Shop\ShopCategory\StoreShopCategoryRequest;
use App\Http\Requests\Shop\ShopCategory\UpdateShopCategoryRequest;
use App\Models\Shop\ShopCategory;
use App\Repositories\Shop\ShopCategoryRepository;
use App\Services\ApiServices\ShopCategoryService;


class ShopCategoriesController extends ApiController
{
    public $shopCategoryRepository;
    public $shopCategoryService;

    public function __construct(ShopCategoryRepository $categoryRepository, ShopCategoryService $categoryService)
    {
        $this->shopCategoryService = $categoryService;
        $this->shopCategoryRepository = $categoryRepository;
    }

    public function index(ShopCategory $shopCategory)
    {
        $this->shopCategoryService->testForEmptiness($shopCategory);
        return response()->json($shopCategory->all(), 200);
    }

    public function edit($id)
    {
        if(!$this->shopCategoryRepository->getById($id)){
            return $this->shopCategoryService->checkOnId();
        }
        return response($this->shopCategoryRepository->getById($id), 200);
    }

    public function store(StoreShopCategoryRequest $request)
    {
        $category = $this->shopCategoryRepository->createCategory($request->input());
        return response()->json($category, 200);
    }

    public function destroy($id)
    {
        $this->shopCategoryRepository->deleteCategory($id);
        return response()->json('', 204);
    }

    public function update(UpdateShopCategoryRequest $request, $id)
    {
        $this->shopCategoryRepository->getById($id)->update($request->input());
        return response()->json($this->shopCategoryRepository->getById($id), 200);
    }
}
