<?php

namespace App\Http\Controllers\Logic;

use App\Actions\UploadAction;
use App\Actions\Factory\ProductFactoryAction;
use App\Events\ProductCreatedEvent;
use App\Http\Controllers\Controller;
use App\Interfaces\Repositories\InventoryRepositoryInterface;
use App\Interfaces\Repositories\ProductRepositoryInterface;
use App\Interfaces\Repositories\PackRepositoryInterface;
use App\Interfaces\Repositories\PlatRepositoryInterface;
use App\Interfaces\Repositories\FoodRepositoryInterface;
use App\Interfaces\Repositories\CategoryRepositoryInterface;
use App\Interfaces\Repositories\ProductPackRepositoryInterface;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Http\Response\PresenterDispatcher;
use App\Notifications\StockAlertNotification;
use Illuminate\Support\Facades\Storage;

class FoodController extends Controller
{

    public function __construct(PackRepositoryInterface  $packRepository, ProductPackRepositoryInterface $productPackRepository, ProductRepositoryInterface $productRepository, CategoryRepositoryInterface $categoryRepository, FoodRepositoryInterface $foodRepository, PlatRepositoryInterface $platRepository, InventoryRepositoryInterface $inventoryRepository, PresenterDispatcher $presenter)
    {
        $this->packRepository = $packRepository;
        $this->platRepository = $platRepository;
        $this->foodRepository = $foodRepository;
        $this->productPackRepository = $productPackRepository;
        $this->productRepository = $productRepository;
        $this->inventoryRepository = $inventoryRepository;
        $this->categoryRepository = $categoryRepository;
        $this->presenter = $presenter;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $data = $this->foodRepository->getAll();
        return $this->presenter->handle(['name' => 'backend.foods.index', 'data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $ingrediants = $this->inventoryRepository->getAll();
        $categories = $this->categoryRepository->getAll();

        return $this->presenter->handle(['name' => 'backend.foods.create', 'data' => [$ingrediants, $categories]]);
    }


    public function store(Request $request, UploadAction $action)
    {
        $dto = $request->all([]);
        $pictureName = "test";
        //  $pictureName = Storage::disk('public')->put('products', $request->photo);

        //creation product
        $factory = new productFactoryAction($this->productRepository, $this->foodRepository, $this->platRepository, $this->productPackRepository);
        $product = $factory->createProduct('food', $dto, $pictureName);
        //creation food
        $this->foodRepository->create($dto, $product, $pictureName);
        //
        //creation product stock
        //service
        $ingrediants = $request->input('ingrediants');
        $quantities = $request->input('quantity');

        for ($i = 0; $i < sizeof($request->input('ingrediants')); $i++) {
            $product->stocks()->attach($ingrediants[$i], ['quantity' => $quantities[$i]]);
        }


        //creation category attached to product
        $product->categories()->attach($request->input('category'));
        return redirect('/foods');
    }
    //  event(new ProductCreatedEvent($food));
    //  $food->notify(new StockAlertNotification());
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = $this->foodRepository->getById($id);
        return $this->presenter->handle(['name' => 'backend.foods.index', 'data' => $data]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function showCategory($name)
    {
        $data = $this->foodRepository->getByCategory($name);
        return response()->json([
            'data' => $data
        ]);
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = $this->foodRepository->getById($id);
        return $this->presenter->handle(['name' => 'backend.foods.update', 'data' => $data]);
    }

    public function update(Request $request): JsonResponse
    {
        $id = $request->route('id');
        $record = $request->only([
            'client',
            'details'
        ]);

        $data =  $this->foodRepository->update($id, $record);

        return $this->presenter->handle(['name' => 'backend.foods.index', 'data' => $data]);
    }

    public function destroy($id, Request $request)
    {
        $food = $this->foodRepository->getById($id);
        $food->product()->delete();
        $this->foodRepository->deleteById($id);
        return redirect('/foods');
    }
}
