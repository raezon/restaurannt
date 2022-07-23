<?php

namespace App\Http\Controllers\Logic;

use App\Actions\UploadAction;
use App\Actions\Factory\ProductFactoryAction;
use App\Http\Controllers\Controller;
use App\Http\Requests\ProductRequest;
use App\Interfaces\Repositories\ProductRepositoryInterface;
use App\Interfaces\Repositories\PackRepositoryInterface;
use App\Interfaces\Repositories\PlatRepositoryInterface;
use App\Interfaces\Repositories\FoodRepositoryInterface;
use App\Interfaces\Repositories\ProductPackRepositoryInterface;
use App\Models\Plat;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Http\Response\PresenterDispatcher;
use Illuminate\Support\Facades\Storage;

class PlatsController extends Controller
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
        $data = $this->platRepository->getAll();
        return $this->presenter->handle(['name' => 'backend.plats.index', 'data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {

        return $this->presenter->handle(['name' => 'backend.plats.create', 'data' => '']);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductRequest $request, ProductFactoryAction $productFactoryAction, UploadAction $action)
    {
        $dto = $request->validated();
        $pictureName = Storage::disk('public')->put('products', $request->photo);
        $factory = new productFactoryAction($this->productRepository, $this->foodRepository, $this->platRepository, $this->productPackRepository);
        $productId = $factory->createProduct('plat', $dto, $pictureName);
        $this->platRepository->create($dto, $productId, $pictureName);
        return redirect('/plats');
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
        return $this->presenter->handle(['name' => 'backend.plats.index', 'data' => $data]);
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
        return $this->presenter->handle(['name' => 'backend.plats.update', 'data' => $data]);
    }

    public function update(Request $request): JsonResponse
    {
        $id = $request->route('id');
        $record = $request->only([
            'client',
            'details'
        ]);

        $data =  $this->Repository->update($id, $record);

        return $this->presenter->handle(['name' => 'backend.plats.index', 'data' => $data]);
    }

    public function destroy(Request $request)
    {
        $id = $request->route('id');
        $this->Repository->delete($id);

        return 'okey';
    }
}
