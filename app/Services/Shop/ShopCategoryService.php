<?php


namespace App\Services\Shop;


use App\Models\Shop\ShopCategory;
use App\Repositories\Shop\ShopCategoryRepository;
use Illuminate\Support\Str;

class ShopCategoryService
{


    public function make($request, $id): bool
    {
        $category = new ShopCategory();
        if($request->parent_id == 0){
            $category->parent_id = null;
        } else {
            $category->parent_id = $request->parent_id;
        }
        $category->name = $request->name;

        if($request->slug){
            $category->slug = $request->slug;
        } else {
            $category->slug = $id.'-'.Str::slug($request->name);
        }

        return $category->save();
    }

    public function update($request,$category): bool
    {

        $category->name = $request->name;

        if($request->parent_id == 0){
            $category->parent_id = null;
        } else {
            $category->parent_id = $request->parent_id;
        }

        if($request->slug){
            $category->slug = $request->slug;
        } else {
            $category->slug = $category->id.'-'.Str::slug($request->name);
        }

        return $category->save();
    }
}
