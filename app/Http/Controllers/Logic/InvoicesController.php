<?php

namespace App\Http\Controllers\Logic;

use App\Actions\StorePanelAction;
use App\Http\Controllers\Controller;
use App\Http\Response\PresenterDispatcher;
use App\Interfaces\Repositories\InvoicesRepositoryInterface;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class InvoicesController extends Controller
{

    public function __construct(InvoicesRepositoryInterface  $repository,PresenterDispatcher $presenter) 
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
        $data=$this->Repository->getAll();
        return $this->presenter->handle(['name' => 'backend.invoices.index', 'data' => $data]);
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

        return $this->presenter->handle(['name' => 'backend.invoices.show', 'data' => $data]);
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

    public function update(Request $request)
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
