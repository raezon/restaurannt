<?php

namespace App\Http\Controllers\Logic;

use App\Http\Controllers\Controller;
use App\Http\Response\PresenterDispatcher;
use App\Interfaces\Repositories\CategoryRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class CategoryController extends Controller
{
    public function __construct(CategoryRepositoryInterface   $repository, PresenterDispatcher $presenter)
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
        // return $request;
        $data = $this->Repository->getAll();
        return $this->presenter->handle(['name' => 'backend.categories.index', 'data' => $data]);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {

        return $this->presenter->handle(['name' => 'backend.categories.create', 'data' => '']);
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
        $this->Repository->create($dto);
        return redirect('/categories');
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data= $this->Repository->getById($id);
        return $this->presenter->handle(['name' => 'backend.categories.show', 'data' => $data]);
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
        return $this->presenter->handle(['name' => 'backend.categories.edit', 'data' => $data]);
    }

    public function update(Request $request)
    {
        $id = $request->route('id');
        $record = $request->only([
            'client',
            'details'
        ]);

        return  $this->Repository->update($id, $record);
    }

    public function destroy($id, Request $request)
    {
        $this->Repository->deleteById($id);
        return redirect('/categories');
    }
}
