<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Http\Response\PresenterDispatcher;
use App\Interfaces\Repositories\ProductRepositoryInterface;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{

    public function __construct(ProductRepositoryInterface  $repository, PresenterDispatcher $presenter)
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
        return $data;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {

        return $this->presenter->handle(['name' => 'backend.products.create', 'data' => '']);
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
        return $this->presenter->handle(['name' => 'backend.products.index', 'data' => $data]);
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
        // $data['picture']=Storage :: url($data['picture']);
        return $this->presenter->handle(['name' => 'backend.products.index', 'data' => $data]);
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
    //    $groups = File::find(i)->groups()->lists('name');

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
        return $this->presenter->handle(['name' => 'backend.products.update', 'data' => $data]);
    }

    public function update(Request $request): JsonResponse
    {
        $id = $request->route('id');
        $record = $request->only([
            'client',
            'details'
        ]);

        $data =  $this->Repository->update($id, $record);

        return $this->presenter->handle(['name' => 'backend.products.index', 'data' => $data]);
    }

    public function destroy(Request $request)
    {
        $id = $request->route('id');
        return $this->Repository->delete($id);
    }
}
