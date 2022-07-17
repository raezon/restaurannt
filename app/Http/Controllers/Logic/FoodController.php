<?php

namespace App\Http\Controllers\Logic;

use App\Actions\UploadAction;
use App\Actions\Factory\ProductFactoryAction;
use App\Http\Controllers\Controller;
use App\Interfaces\Repositories\ProductRepositoryInterface;
use App\Interfaces\Repositories\PackRepositoryInterface;
use App\Interfaces\Repositories\PlatRepositoryInterface;
use App\Interfaces\Repositories\FoodRepositoryInterface;
use App\Interfaces\Repositories\ProductPackRepositoryInterface;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Http\Response\PresenterDispatcher;
use Illuminate\Support\Facades\Storage;

class FoodController extends Controller
{

    public function __construct(PackRepositoryInterface  $packRepository, ProductPackRepositoryInterface $productPackRepository, ProductRepositoryInterface $productRepository, FoodRepositoryInterface $foodRepository, PlatRepositoryInterface $platRepository, PresenterDispatcher $presenter)
    {
        $this->packRepository = $packRepository;
        $this->platRepository = $platRepository;
        $this->foodRepository = $foodRepository;
        $this->productPackRepository = $productPackRepository;
        $this->productRepository = $productRepository;
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

        return $this->presenter->handle(['name' => 'backend.foods.create', 'data' => '']);
    }


    public function store(Request $request, UploadAction $action)
    {

        $dto = $request->all([]);
        $pictureName=Storage::disk('local')->put('products', $request->photo);
        $factory = new productFactoryAction($this->productRepository, $this->foodRepository, $this->platRepository, $this->productPackRepository);
        $productId = $factory->createProduct('food', $dto, $pictureName);
        $this->foodRepository->create($dto, $productId, $pictureName);
        return redirect('/foods');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = $this->Repository->getById($id);
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
        $data = $this->Repository->getByCategory($name);
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
        $data = $this->Repository->getById($id);
        return $this->presenter->handle(['name' => 'backend.foods.update', 'data' => $data]);
    }

    public function update(Request $request): JsonResponse
    {
        $id = $request->route('id');
        $record = $request->only([
            'client',
            'details'
        ]);

        $data =  $this->Repository->update($id, $record);

        return $this->presenter->handle(['name' => 'backend.foods.index', 'data' => $data]);
    }

    public function destroy($id, Request $request)
    {
        $this->Repository->deleteById($id);
        return redirect('/foods');
    }
}
