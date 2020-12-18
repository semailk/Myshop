<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Shop\ShopReview;
use Illuminate\Http\Request;

class ShopReviewController extends ApiController
{
    public function index(ShopReview $image)
    {
        if (empty($image)){
            return response()->json(['error' => true,'message' => 'not found'],404);
        }
        return response()->json($image->all(),200);
    }

    public function edit($id)
    {
        if (is_null(ShopReview::query()->find($id))) {
            return response()->json(['error' => true, 'message' => 'not found'], 404);
        }
        return response(ShopReview::query()->find($id), 200);
    }

    public function store(Request $request)
    {
        $rules = ['content' => 'required|min:5|max:1000', 'rating' => 'required|int'];

        $array = $this->validate($request, $rules);
        $data = ShopReview::query()->create($array);

        return response()->json($data,200);
    }

    public function destroy($id)
    {
        $userDelete = ShopReview::query()->find($id)->delete();
        return response()->json($userDelete,204);
    }

    public function update(Request $request, $id)
    {
        $rules = ['content' => 'required|min:5|max:1000', 'rating' => 'required|int'];

        $array = $this->validate($request, $rules);

        $userUpdate = ShopReview::query()->find($id)->update($array);

        return response()->json($userUpdate,200);
    }
}
