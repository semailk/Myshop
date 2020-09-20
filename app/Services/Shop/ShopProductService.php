<?php


namespace App\Services\Shop;


use App\Models\Shop\ShopCategory;
use App\Models\Shop\ShopProduct;
use App\Repositories\Shop\ShopCategoryRepository;
use Illuminate\Support\Str;

class ShopProductService
{


    public function make($request, $id): bool
    {
        $product = new ShopProduct();
        if($request->category_id == 0){
            return false;
        } else {
            $product->category_id = $request->category_id;
        }
        $product->title = $request->title;

        if($request->description){
            $product->description = $request->description;
        } else {
            $product->description = $id.'-'.Str::slug($request->title);
        }

        return $product->save();
    }

    public function update($request,$product): bool
    {

        $product->title = $request->title;

        if($request->category_id == 0){
            return false;
        } else {
            $product->category_id = $request->category_id;
        }

        if($request->description){
            $product->description = $request->description;
        } else {
            $product->description = $product->id.'-'.Str::slug($request->title);
        }

        return $product->save();
    }
}
