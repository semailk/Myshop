<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Image;
use App\Models\User;
use Illuminate\Http\Request;

class ShopImagesController extends ApiController
{
    public function index(Image $image)
    {
        if (empty($image)){
            return response()->json(['error' => true,'message' => 'not found'],404);
        }
        return response()->json($image->all(),200);
    }

    public function edit($id)
    {
        if (is_null(Image::query()->find($id))) {
            return response()->json(['error' => true, 'message' => 'not found'], 404);
        }
        return response(Image::query()->find($id), 200);
    }

    public function store(Request $request)
    {
        $rules = ['src' => 'required'];
        $array = $this->validate($request, $rules);

        $data = Image::query()->create($array);
        return response()->json($data,200);
    }

    public function destroy($id)
    {
        $userDelete = Image::query()->find($id)->delete();
        return response()->json($userDelete,204);
    }

    public function update(Request $request, $id)
    {
        $rules = ['src' => 'required'];
        $array = $this->validate($request, $rules);

        $userUpdate = Image::query()->find($id)->update($array);

        return response()->json($userUpdate,200);
    }
}
