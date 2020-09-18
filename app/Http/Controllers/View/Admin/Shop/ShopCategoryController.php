<?php

namespace App\Http\Controllers\View\Admin\Shop;

use App\Http\Controllers\Controller;
use App\Models\Shop\ShopCategory;
use App\Repositories\Shop\ShopCategoryRepository;
use App\Http\Requests\Shop\ShopCategory\StoreShopCategoryRequest;
use Illuminate\View\View;
use App\Services\Shop\ShopCategoryService;

class ShopCategoryController extends Controller
{
    protected $ShopCategoryService;


    protected $shopCategoryRepository;

    public function __construct()
    {
        $this->shopCategoryRepository = app(ShopCategoryRepository::class);
        $this->storeShopCategoryService = app(ShopCategoryService::class);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(): View
    {
        $categories = $this->shopCategoryRepository->getAll();
        return view('admin.shop.categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(): View
    {
        return \view('admin.shop.categories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreShopCategoryRequest $request)
    {

        return \redirect(route('categories.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id): View
    {
        $categories = $this->shopCategoryRepository->getById($id);

        return view('admin.shop.categories.edit', compact('categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreShopCategoryRequest $request, $id)
    {
        $update = $this->shopCategoryRepository->getForUpdate($id);
        $update->name = $request->name;
        $update->slug = $request->slug;
        $update->save();
        return \redirect(route('categories.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        ShopCategory::find($id)->delete();
        return \redirect(route('categories.index'));
    }
}
