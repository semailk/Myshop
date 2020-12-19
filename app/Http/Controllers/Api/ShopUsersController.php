<?php

namespace App\Http\Controllers\Api;


use App\Http\Controllers\Controller;
use App\Http\Requests\Shop\Users\StoreUserRequest;
use App\Http\Requests\Shop\Users\UpdateUserRequest;
use App\Models\User;
use App\Repositories\Shop\ShopUserRepository;
use App\Services\ApiServise\ShopUserService;

class ShopUsersController extends Controller
{
    public $shopUserRepository;
    public $shopUserService;

    public function __construct(ShopUserRepository $userRepository, ShopUserService $userService)
    {
        $this->shopUserRepository = $userRepository;
        $this->shopUserService = $userService;
    }

    public function index(User $user)
    {
        if (!$user) {
            return $this->shopUserService->checkOnId();
        }
        return response()->json($this->shopUserRepository->getAll(), 200);
    }

    public function edit($id)
    {
        if (!$this->shopUserRepository->getById($id)) {
            return $this->shopUserService->checkOnId();
        }
        return response($this->shopUserRepository->getById($id), 200);
    }

    public function store(StoreUserRequest $request)
    {
        $this->shopUserRepository->createUser($request->input());
        return response()->json($this->shopUserRepository->getAll(), 200);
    }

    public function destroy($id)
    {
        $this->shopUserRepository->getById($id)->delete();
        return response()->json('', 204);
    }

    public function update(UpdateUserRequest $request, $id)
    {
        $this->shopUserRepository->getById($id)->update($request->input());
        return response()->json($this->shopUserRepository->getById($id), 200);
    }
}
