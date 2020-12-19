<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\Shop\Review\StoreReviewRequest;
use App\Http\Requests\Shop\Review\UpdateReviewRequest;
use App\Models\Shop\ShopReview;
use App\Repositories\Shop\ShopReviewRepository;
use App\Services\ApiServices\ShopReviewService;

class ShopReviewController extends ApiController
{
    public $shopReviewRepository;
    public $shopReviewService;

    public function __construct(ShopReviewRepository $reviewRepository, ShopReviewService $reviewService)
    {
        $this->shopReviewRepository = $reviewRepository;
        $this->shopReviewService = $reviewService;
    }

    public function index(ShopReview $review){
        if (!$review){
            return $this->shopReviewService->checkOnId();
        }
        return response()->json($this->shopReviewRepository->getAll(),200);
    }

    public function edit($id)
    {
        if (!$this->shopReviewRepository->getById($id)) {
            return $this->shopReviewService->checkOnId();
        }
        return response($this->shopReviewRepository->getById($id), 200);
    }

    public function store(StoreReviewRequest $request)
    {
        $this->shopReviewRepository->createReview($request->input());
        return response()->json($this->shopReviewRepository->getAll(),200);
    }

    public function destroy($id)
    {
        $this->shopReviewRepository->getById($id)->delete();
        return response()->json('',204);
    }

    public function update(UpdateReviewRequest $request, $id)
    {
        $this->shopReviewRepository->getById($id)->update($request->input());
        return response()->json($this->shopReviewRepository->getById($id),200);
    }
}
