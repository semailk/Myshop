<?php


namespace App\Services\ApiServices;


use App\Models\Shop\ShopCategory;
use Illuminate\Support\Str;

class ShopCategoryService
{

    public function make($request, $id): bool
    {
        $category = new ShopCategory();
        if ($request->parent_id == 0) {
            $category->parent_id = null;
        } else {
            $category->parent_id = $request->parent_id;
        }
        $category->name = $request->name;

        if ($request->slug) {
            $category->slug = $request->slug;
        } else {
            $category->slug = $id . '-' . Str::slug($request->name);
        }

        return $category->save();
    }

    public function update($request, $category): bool
    {

        $category->name = $request->name;

        if ($request->parent_id == 0) {
            $category->parent_id = null;
        } else {
            $category->parent_id = $request->parent_id;
        }

        if ($request->slug) {
            $category->slug = $request->slug;
        } else {
            $category->slug = $category->id . '-' . Str::slug($request->name);
        }

        return $category->save();
    }

    public function testForEmptiness($request)
    {
        if (empty($request)) {
            return response()->json(['error' => true, 'message' => 'not found'], 404);
        }
    }

    public function checkOnId()
    {
        return response()->json(['error' => true, 'message' => 'not found'], 404);
    }
}
