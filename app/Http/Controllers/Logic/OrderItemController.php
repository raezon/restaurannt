<?php

namespace App\Http\Controllers\Logic;

use App\Actions\StorePanelAction;
use App\Http\Controllers\Controller;
use App\Interfaces\Repositories\InventoryRepositoryInterface;
use App\Interfaces\Repositories\OrderItemRepositoryInterface;
use App\Services\StockService;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class OrderItemController extends Controller
{
    public function __construct(OrderItemRepositoryInterface  $repository,
        InventoryRepositoryInterface $inventoryRepository,
        StockService $stockService)
    {
        $this->Repository = $repository;
        $this->inventoryRepository = $inventoryRepository;
        $this->stockService= $stockService;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // return $request;
        return $this->Repository->getAll();
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
        return $this->Repository->create($dto);
    }
    public function bulkInsert(Request $request)
    {
        $orderId = $request->input('orderId');
        $dto = $request->input('orderItem');
        $bulkInserted=$this->Repository->bulkInsert($dto);
        $orderItems= $this->Repository->getAllEn($orderId);

        if($orderItems){
          
            $this->stockService->updateStock($orderItems, $this->inventoryRepository);
        }
    

        return  $bulkInserted;
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
