<?php


namespace App\Repositories\Shop;


use App\Models\Shop\ShopCategory;
use App\Repositories\CoreRepository;
use App\Models\Shop\ShopCategory as Model;

class ShopCategoryRepository extends CoreRepository
{

    public function getModelClass()
    {
        return Model::class;
    }

    public function getAllPaginate()
    {
        return $this->startConditions()->with('children')->paginate(10);
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

    public function getLastId()
    {
        if ($this->startConditions()::count() > 0) {
            return $this->startConditions()::select('id')->orderBy('id', 'desc')->first()->id;
        } else {
            return 0;
        }
    }

    public function getForSelect($id=null)
    {
        return $this->startConditions()::select('id','name')->where('id', '!=', $id)->get();
    }
}
