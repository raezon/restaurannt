<?php

namespace App\Http\Controllers\Logic;

use App\Actions\StorePanelAction;
use App\Http\Controllers\Controller;
use App\Interfaces\Repositories\FoodsRepositoryInterface;
use App\Interfaces\Repositories\PlatRepositoryInterface;
use App\Models\Plat;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Http\Response\PresenterDispatcher;
use App\Interfaces\Repositories\FoodRepositoryInterface;
use App\Interfaces\Repositories\PackRepositoryInterface;
use App\Interfaces\Repositories\ProductPackRepositoryInterface;
use App\Repositories\FoodRepository;

class PackController extends Controller
{

    public function __construct(PackRepositoryInterface  $packRepository,ProductPackRepositoryInterface $productPackRepository, FoodRepositoryInterface $foodRepository, PlatRepositoryInterface $platRepository, PresenterDispatcher $presenter)
    {
        $this->packRepository = $packRepository;
        $this->platRepository = $platRepository;
        $this->foodRepository = $foodRepository;
        $this->productPackRepository=$productPackRepository;
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

        $result = array_merge((array)$plats, (array)$foods);
        return $this->presenter->handle(['name' => 'backend.packs.create', 'data' => $result]);
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
        $pack = $this->packRepository->create($dto);
        foreach ($dto['pack'] as $product) {
            $this->productPackRepository->create(['product_id'=>$product,'pack_id'=>$pack['id']]);
        }
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

    public function destroy(Request $request,$id)
    {

        $this->packRepository->deleteById($id);
        return redirect('/packs ');
    }
}
