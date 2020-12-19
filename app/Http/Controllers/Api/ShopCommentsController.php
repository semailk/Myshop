<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\Shop\Comment\StoreCommentRequest;
use App\Http\Requests\Shop\Comment\UpdateCommentRequest;
use App\Models\Comment;
use App\Repositories\Shop\ShopCommentRepository;
use App\Services\ApiServise\ShopCommentService;

class ShopCommentsController extends ApiController
{
    public $shopCommentRepository;
    public $shopCommentService;

    public function __construct(ShopCommentRepository $commentRepository, ShopCommentService $commentService)
    {
        $this->shopCommentRepository = $commentRepository;
        $this->shopCommentService = $commentService;
    }

    public function index(Comment $comment)
    {
        $this->shopCommentService->testForEmptiness($comment);
        return response()->json($this->shopCommentRepository->getAll(), 200);
    }

    public function edit($id)
    {
        if (!$this->shopCommentRepository->getById($id)) {
            return $this->shopCommentService->checkOnId();
        }
        return response($this->shopCommentRepository->getById($id), 200);
    }

    public function store(StoreCommentRequest $request)
    {
        $this->shopCommentRepository->createComment($request->input());
        return response()->json($this->shopCommentRepository->getAll(), 200);
    }

    public function destroy($id)
    {
        $this->shopCommentRepository->getById($id)->delete();
        return response()->json('', 204);
    }

    public function update(UpdateCommentRequest $request, $id)
    {
        $this->shopCommentRepository->getById($id)->update($request->input());
        return response()->json($this->shopCommentRepository->getById($id), 200);
    }
}
