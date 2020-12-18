<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\Shop\ShopCategory\StoreShopCategoryRequest;
use App\Models\Shop\ShopCategory;
use Illuminate\Http\Request;


class ShopCategoriesController extends ApiController
{

    public function index(ShopCategory $shopCategory)
    {
        if (empty($shopCategory)){
            return response()->json(['error' => true,'message' => 'not found'],404);
        }
        return response()->json($shopCategory->all(),200);
    }

    public function edit($id)
    {
        if (is_null(ShopCategory::query()->find($id))) {
            return response()->json(['error' => true, 'message' => 'not found'], 404);
        }
        return response(ShopCategory::query()->find($id), 200);
    }

    public function store(StoreShopCategoryRequest $request)
    {
//        $rules = [
//            'name' => 'required|min:5|max:250',
//            'slug' => 'nullable|min:5|max:250',
//            'parent_id' => 'nullable|numeric'
//        ];

//        $array = $this->validate($request, $rules);

       $array = ShopCategory::query()->create($request->input());
        return response()->json($array,200);
    }

    public function destroy($id)
    {
        $userDelete = ShopCategory::query()->find($id)->delete();
        return response()->json($userDelete,204);
    }

    public function update(Request $request, $id)
    {

        $rules = [
            'name' => 'required|min:5|max:250',
            'slug' => 'nullable|min:5|max:250',
            'parent_id' => 'nullable|numeric'
        ];

        $array = $this->validate($request, $rules);

        $userUpdate = ShopCategory::query()->find($id)->update($array);

        return response()->json($userUpdate,200);
    }
}
