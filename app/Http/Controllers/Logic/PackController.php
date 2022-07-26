<?php

namespace App\Http\Controllers\Logic;

use App\Http\Controllers\Controller;
use App\Actions\Factory\ProductFactoryAction;
use App\Interfaces\Repositories\PlatRepositoryInterface;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Http\Response\PresenterDispatcher;
use App\Interfaces\Repositories\CategoryRepositoryInterface;
use App\Interfaces\Repositories\FoodRepositoryInterface;
use App\Interfaces\Repositories\InventoryRepositoryInterface;
use App\Interfaces\Repositories\PackRepositoryInterface;
use App\Interfaces\Repositories\ProductPackRepositoryInterface;
use App\Interfaces\Repositories\ProductRepositoryInterface;
use Illuminate\Support\Facades\Storage;

class PackController extends Controller
{

    public function __construct(ProductRepositoryInterface $productRepository,PackRepositoryInterface  $packRepository, InventoryRepositoryInterface $inventoryRepository, CategoryRepositoryInterface $categoryRepository, ProductPackRepositoryInterface $productPackRepository, FoodRepositoryInterface $foodRepository, PlatRepositoryInterface $platRepository, PresenterDispatcher $presenter)
    {
        $this->packRepository = $packRepository;
        $this->platRepository = $platRepository;
        $this->foodRepository = $foodRepository;
        $this->productRepository = $productRepository;
        $this->inventoryRepository = $inventoryRepository;
        $this->categoryRepository = $categoryRepository;
        $this->productPackRepository = $productPackRepository;
        $this->presenter = $presenter;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $data = $this->packRepository->getAll();
        return $this->presenter->handle(['name' => 'backend.packs.index', 'data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $plats = $this->platRepository->getAll()->toArray();
        $foods = $this->foodRepository->getAll()->toArray();
        $ingrediants = $this->inventoryRepository->getAll();
        $categories = $this->categoryRepository->getAll();
        $result = array_merge((array)$plats, (array)$foods);
        return $this->presenter->handle(['name' => 'backend.packs.create', 'data' => [$ingrediants, $categories, $result]]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $dto = $request->all([]);
        $pictureName = Storage::disk('public')->put('products', $request->photo);

        $factory = new productFactoryAction($this->productRepository, $this->foodRepository, $this->platRepository, $this->productPackRepository);
        $product = $factory->createProduct('pack', $dto, $pictureName);
        //creation pack
        $this->packRepository->create($dto, $product, $pictureName);
        //creation category attached to product
        $product->categories()->attach($request->input('category'));

        return redirect('/packs ');
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = $this->packRepository->getById($id);
        return $this->presenter->handle(['name' => 'backend.packs.index', 'data' => $data]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = $this->packRepository->getById($id);
        return $this->presenter->handle(['name' => 'backend.packs.update', 'data' => $data]);
    }

    public function update(Request $request): JsonResponse
    {
        $id = $request->route('id');
        $record = $request->only([
            'client',
            'details'
        ]);

        $data =  $this->packRepository->update($id, $record);

        return $this->presenter->handle(['name' => 'backend.packs.index', 'data' => $data]);
    }

    public function destroy(Request $request, $id)
    {

        $this->packRepository->deleteById($id);
        return redirect('/packs ');
    }
}
