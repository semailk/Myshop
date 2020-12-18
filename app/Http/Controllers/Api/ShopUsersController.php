<?php

namespace App\Http\Controllers\Api;


use App\Http\Controllers\Controller;
use App\Models\Shop\ShopProduct;
use App\Models\User;
use Illuminate\Http\Request;

class ShopUsersController extends Controller
{
    public function index(User $user)
    {
        if (empty($user)){
            return response()->json(['error' => true,'message' => 'not found'],404);
        }
        return response()->json($user->all(),200);
    }

    public function edit($id)
    {
        if (is_null(User::query()->find($id))) {
            return response()->json(['error' => true, 'message' => 'not found'], 404);
        }
        return response(User::query()->find($id), 200);
        }

    public function store(Request $request)
    {
        $rules = ['first_name' => 'required|min:2|max:50',
            'last_name' => 'required|min:2|max:50',
            'name' => 'required|unique:users|min:2|max:50',
            'email' => 'required|unique:users',
            'password' => 'required|min:8|max:50'
            ];

        $array = $this->validate($request,$rules);
        $data = User::query()->create($array);
        return response()->json($data,200);
    }

    public function destroy($id)
    {
        $userDelete = User::query()->find($id)->delete();
        return response()->json($userDelete,204);
    }

    public function update(Request $request, $id)
    {
        $rules = ['first_name' => 'required|min:2|max:50',
            'last_name' => 'required|min:2|max:50',
            'name' => 'required|unique:users|min:2|max:50',
            'email' => 'required|unique:users',
            'password' => 'required|min:8|max:50'
        ];

        $array = $this->validate($request,$rules);

        $userUpdate = User::query()->find($id)->update($array);

        return response()->json($userUpdate,200);
    }
}
