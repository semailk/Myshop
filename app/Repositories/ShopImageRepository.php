<?php


namespace App\Repositories\Shop;


use App\Repositories\CoreRepository;
use App\Models\Image as Model;

class ShopImageRepository extends CoreRepository
{
    public function getModelClass()
    {
        return Model::class;
    }

    public function getAll()
    {
        return $this->startConditions()->all();
    }

    public function getById($id)
    {
        return $this->startConditions()->find($id);
    }

    public function createImage($request)
    {
        return $this->startConditions()->create($request);
    }

}
