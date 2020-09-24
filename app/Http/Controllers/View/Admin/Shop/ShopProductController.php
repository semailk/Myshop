<?php

namespace App\Http\Controllers\View\Admin\Shop;

use App\Http\Controllers\Controller;
use App\Http\Requests\Shop\ShopProduct\StoreShopProductRequest;
use App\Http\Requests\Shop\ShopProduct\UpdateShopProductRequest;
use App\Models\Shop\ShopCategory;
use App\Models\Shop\ShopProduct;
use App\Repositories\Shop\ShopCategoryRepository;
use App\Services\Shop\ShopProductService;
use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Repositories\Shop\ShopProductRepository;

class ShopProductController extends Controller
{
    protected $shopProductRepository;
    protected $shopProductService;
    protected $ShopCategoryRepository;

    public function __construct()
    {
        $this->shopProductRepository = app(ShopProductRepository::class);
        $this->shopProductService = app(ShopProductService::class);
        $this->ShopCategoryRepository = app(ShopCategoryRepository::class);

    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(): View
    {
        $products = $this->shopProductRepository->getAllPaginate();
        return view('admin.shop.products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Http\Response|View
     */
    public function create()
    {
        $categories = $this->ShopCategoryRepository->getAll();
        return \view('admin.shop.products.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(StoreShopProductRequest $request)
    {
        $make = $this->shopProductService->make($request, $request->category_id);

        if ($make) {
            return back()->with(['success' => 'Категория успешная создана']);
        } else {
            return back()->withErrors(['error' => 'Ошибка , при создании категории']);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $categories = $this->ShopCategoryRepository->getAll();
        $product = $this->shopProductRepository->getById($id);

        return \view('admin.shop.products.edit', compact('categories'), compact('product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(UpdateShopProductRequest $request, $id)
    {
        $product = $this->shopProductRepository->getById($id);

        $update = $this->shopProductService->update($request, $product);

        if($update)
        {
            return back()->with(['success' => 'Товар успешно обновлен']);
        } else {
            return back()->withErrors(['error' => 'Ошибка , при обновлении товара']);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Http\Response|View
     */
    public function destroy($id)
    {
        ShopProduct::find($id)->delete();

        return redirect(route('products.index'));
    }
}
