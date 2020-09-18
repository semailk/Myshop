<?php


namespace App\Services\Shop;


use App\Models\Shop\ShopCategory;

class ShopCategoryService
{
    public function make($request):bool
    {
        $shop = new ShopCategory();
        $shop->parent_id = null;
        $shop->name = $request->name;
        $shop->slug = $request->slug;

        return $shop->save();
    }
}
