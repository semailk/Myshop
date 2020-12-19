<?php


namespace App\Repositories\Shop;


use App\Repositories\CoreRepository;
use App\Models\Shop\ShopReview as Model;

class ShopReviewRepository extends CoreRepository
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

    public function createReview($request)
    {
        return $this->startConditions()->create($request);
    }
}
