<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use Illuminate\Http\Request;

class ShopCommentsController extends ApiController
{
    public function index(Comment $image)
    {
        if (empty($image)) {
            return response()->json(['error' => true, 'message' => 'not found'], 404);
        }
        return response()->json($image->all(), 200);
    }

    public function edit($id)
    {
        if (is_null(Comment::query()->find($id))) {
            return response()->json(['error' => true, 'message' => 'not found'], 404);
        }
        return response(Comment::query()->find($id), 200);
    }

    public function store(Request $request)
    {
        $rules = ['comment' => 'min:5|max:250'];

        $array = $this->validate($request, $rules);
        Comment::query()->create($array);
        return response()->json($array, 200);
    }

    public function destroy($id)
    {
        $userDelete = Comment::query()->find($id)->delete();
        return response()->json($userDelete, 204);
    }

    public function update(Request $request, $id)
    {
        $rules = ['comment' => 'min:5|max:250'];

        $array = $this->validate($request, $rules);

        $userUpdate = Comment::query()->find($id)->update($array);

        return response()->json($userUpdate, 200);
    }
}
