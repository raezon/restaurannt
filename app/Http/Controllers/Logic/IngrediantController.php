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
use App\Interfaces\Repositories\IngrediantRepositoryInterface;

class IngrediantController extends Controller
{

    public function __construct(IngrediantRepositoryInterface  $repository, PresenterDispatcher $presenter)
    {
        $this->Repository = $repository;
        $this->presenter = $presenter;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $data = $this->Repository->getAll();
        return $this->presenter->handle(['name' => 'backend.ingrediants.index', 'data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {

        return $this->presenter->handle(['name' => 'backend.ingrediants.create', 'data' => '']);
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
        $data = $this->Repository->create($dto);
        return $this->presenter->handle(['name' => 'backend.ingrediants.index', 'data' => $data]);
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
        return $this->presenter->handle(['name' => 'backend.ingrediants.index', 'data' => $data]);
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
        return $this->presenter->handle(['name' => 'backend.ingrediants.update', 'data' => $data]);
    }

    public function update(Request $request): JsonResponse
    {
        $id = $request->route('id');
        $record = $request->only([
            'client',
            'details'
        ]);

        $data =  $this->Repository->update($id, $record);

        return $this->presenter->handle(['name' => 'backend.ingrediants.index', 'data' => $data]);
    }

    public function destroy(Request $request)
    {
        $id = $request->route('id');
        $this->Repository->delete($id);

        return 'okey';
    }
}
