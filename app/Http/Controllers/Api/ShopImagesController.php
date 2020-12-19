<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\Shop\Image\StoreImageRequest;
use App\Http\Requests\Shop\Image\UpdateImageRequest;
use App\Repositories\Shop\ShopImageRepository;
use App\Services\ApiServise\ShopImageService;

class ShopImagesController extends ApiController
{
    public $shopImageRepository;
    public $shopImageService;
    public function __construct(ShopImageRepository $imageRepository, ShopImageService $imageService)
    {
        $this->shopImageRepository = $imageRepository;
        $this->shopImageService = $imageService;
    }

    public function index()
    {
        if(!$this->shopImageRepository->getAll()){
            return $this->shopImageService->checkOnId();
        }
        return response()->json($this->shopImageRepository->getAll(), 200);
    }

    public function edit($id)
    {
        if(!$this->shopImageRepository->getById($id)){
            return $this->shopImageService->checkOnId();
        }
        return response($this->shopImageRepository->getById($id), 200);
    }

    public function store(StoreImageRequest $request)
    {
        $this->shopImageRepository->createImage($request->input());
        return response()->json($this->shopImageRepository->getAll(), 200);
    }

    public function destroy($id)
    {
        $this->shopImageRepository->getById($id)->delete();
        return response()->json('', 204);
    }

    public function update(UpdateImageRequest $request, $id)
    {
        $this->shopImageRepository->getById($id)->update($request->input());

        return response()->json($this->shopImageRepository->getById($id), 200);
    }
}
