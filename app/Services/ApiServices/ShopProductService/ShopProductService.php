<?php


namespace App\Services\Shop;


use App\Models\Shop\ShopCategory;
use App\Models\Shop\ShopProduct;
use App\Repositories\Shop\ShopCategoryRepository;
use Illuminate\Support\Str;

class ShopProductService
{


    public function make($request): bool
    {
        $product = new ShopProduct();
        $product->category_id = $request->category_id;
        $product->title = $request->title;
        $product->description = $request->description;

        return $product->save();
    }

    public function update($request,$product): bool
    {

        $product->title = $request->title;
        $product->category_id = $request->category_id;
        $product->description = $request->description;

        return $product->save();
    }
}
