<?php

namespace App\Http\Controllers\View\Admin\Shop;

use App\Http\Controllers\Controller;
use App\Http\Requests\Shop\ShopCategory\StoreShopCategoryRequest;
use App\Http\Requests\Shop\ShopProduct\UpdateShopProductRequest;
use App\Models\Shop\ShopCategory;
use App\Repositories\Shop\ShopCategoryRepository;
use Illuminate\View\View;
use App\Services\Shop\ShopCategoryService;

class ShopCategoryController extends Controller
{
    protected $shopCategoryService;


    protected $shopCategoryRepository;

    public function __construct()
    {
        $this->shopCategoryRepository = app(ShopCategoryRepository::class);
        $this->shopCategoryService = app(ShopCategoryService::class);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(): View
    {

        $categories = $this->shopCategoryRepository->getAllPaginate();

        return view('admin.shop.categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|View
     */
    public function create()
    {
        $categories = $this->shopCategoryRepository->getForSelect();

        return \view('admin.shop.categories.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(StoreShopCategoryRequest $request)
    {

        $lastId = $this->shopCategoryRepository->getLastId();

        $make = $this->ShopCategoryService->make($request, $lastId + 1);

        if ($make) {
            return back()->with(['success' => 'Категория успешная создана']);
        } else {
            return back()->withErrors(['error' => 'Ошибка , при создании категории']);
        }

//        return \redirect(route('categories.index'));
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
        $categories = $this->shopCategoryRepository->getForSelect($id);
        $category = $this->shopCategoryRepository->getById($id);

        return view('admin.shop.categories.edit', compact('category'), compact('categories'));
    }

    /**
     * Update the specified resource in storage.
     * Seed the application's database.
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @return \Illuminate\Http\Response
     *
     *
     */

    public function update(UpdateShopProductRequest $request, $id)
    {

        $category = $this->shopCategoryRepository->getForUpdate($id);
        if (!$category) {
            abort(404);
        }
        $update = $this->shopCategoryService->update($request, $category);
        if ($update) {
            return back()->with(['success' => 'Категория успешная обновлена']);
        } else {
            return back()->withErrors(['error' => 'Ошибка , при обновлении категории']);
        }

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
