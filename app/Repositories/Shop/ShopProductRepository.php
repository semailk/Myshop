<?php


namespace App\Repositories\Shop;


use App\Repositories\CoreRepository;
use App\Models\Shop\ShopProduct as Model;

class ShopProductRepository extends CoreRepository
{
    public function getModelClass()
    {
        return Model::class;
    }

    public function getAllPaginate()
    {
        return $this->startConditions()->paginate(10);
    }

    public function getById($id)
    {
        return $this->startConditions()->find($id);
    }

}
