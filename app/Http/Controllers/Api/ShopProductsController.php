<?php

namespace App\Http\Controllers\Api;

use App\Models\Image;
use App\Models\Shop\ShopProduct;
use App\Models\User;
use Illuminate\Http\Request;

class ShopProductsController extends ApiController
{

    public function index(ShopProduct $shopProduct)
    {
        if (empty($shopProduct)) {
            return response()->json(['error' => true, 'message' => 'not found'], 404);
        }
        return response()->json($shopProduct->all(), 200);
    }

    public function edit($id)
    {
        if (is_null(ShopProduct::query()->find($id))) {
            return response()->json(['error' => true, 'message' => 'not found'], 404);
        }
        return response(ShopProduct::query()->find($id), 200);
    }

    public function store(Request $request)
    {
        $rules = ['title' => 'required|min:2|max:155', 'description' => 'required|min:5|max:1000'];

        $array = $this->validate($request,$rules);
        $data = ShopProduct::query()->create($array);
        return response()->json($data, 200);
    }

    public function destroy($id)
    {
        $userDelete = ShopProduct::query()->find($id)->delete();
        return response()->json($userDelete, 204);
    }

    public function update(Request $request, $id)
    {
        $rules = ['title' => 'required|min:2|max:155', 'description' => 'required|min:5|max:1000'];

        $array = $this->validate($request,$rules);

        $userUpdate = ShopProduct::query()->find($id)->update($request->input());

        return response()->json($userUpdate, 200);
    }
}
