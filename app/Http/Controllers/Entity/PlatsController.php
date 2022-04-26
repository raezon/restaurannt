<?php

namespace App\Http\Controllers\Entity;

use App\Actions\StorePanelAction;
use App\Http\Controllers\Controller;
use App\Interfaces\FoodsRepositoryInterface;
use App\Interfaces\PlatRepositoryInterface;
use App\Models\Plat;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Http\Response\PresenterDispatcher;

class PlatsController extends Controller
{

    public function __construct(PlatRepositoryInterface  $repository, PresenterDispatcher $presenter)
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
        return $this->presenter->handle(['name' => 'backend.plats.index', 'data' => '5']);
        // return $this->presenter->handle(['5']);
        return response()->json([
            'data' => $this->Repository->getAll()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {

        $dto = $request->all([]);
        return $this->Repository->create($dto);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //call view store
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return $this->Repository->getById($id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //call view edit
    }

    public function update(Request $request): JsonResponse
    {
        $id = $request->route('id');
        $record = $request->only([
            'client',
            'details'
        ]);

        return  $this->Repository->update($id, $record);
    }

    public function destroy(Request $request)
    {
        $id = $request->route('id');
        $this->Repository->delete($id);

        return 'okey';
    }
}