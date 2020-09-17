<?php


namespace App\Repositories\Shop;


use App\Repositories\CoreRepository;
use App\Models\Shop\ShopCategory as Model;

class ShopCategoryRepository extends CoreRepository
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

    public function getForUpdate($id)
    {
        return $this->startConditions()->find($id);
    }

    public function createCategory($request)
    {
        return $this->startConditions()->create($request);
    }
}
