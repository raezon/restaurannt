<?php

namespace App\Http\Controllers\Logic;

use App\Http\Controllers\Controller;
use App\Http\Response\PresenterDispatcher;
use App\Interfaces\Repositories\SettingsRepositoryInterface;
use App\Interfaces\Repositories\FoodRepositoryInterface;
use App\Interfaces\Repositories\PlatRepositoryInterface;
use App\Interfaces\Repositories\ProductPackRepositoryInterface;
use App\Interfaces\Repositories\CategoryRepositoryInterface;
use App\Interfaces\Repositories\ProductRepositoryInterface;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Http\JsonResponse;
use App\Actions\Factory\ProductFactoryAction;
use App\Interfaces\Repositories\OrderRepositoryInterface;
use App\Mail\testMail;
use App\Mail\testMarkDownEmail;
use App\Notifications\StockAlertNotification;
use App\Repositories\InventoryRepository;
use App\Services\OrderService;
use App\Services\StockService;
use Illuminate\Support\Facades\Mail;

//needs here to be polymophic
class BillController extends Controller
{
    public function __construct(FoodRepositoryInterface $foodRepository, PlatRepositoryInterface $platRepository, ProductPackRepositoryInterface $packProduct, CategoryRepositoryInterface $categoryRepository, SettingsRepositoryInterface $settingsRepository, ProductRepositoryInterface $productRepository, StockService $stockService, InventoryRepository $inventoryRepository,OrderRepositoryInterface $orderRepository,OrderService $orderService, PresenterDispatcher $presenter)
    {
        $this->foodRepository = $foodRepository;
        $this->platRepository = $platRepository;
        $this->packProduct = $packProduct;
        $this->inventoryRepository = $inventoryRepository;
        $this->categoryRepository = $categoryRepository;
        $this->settingsRepository = $settingsRepository;
        $this->productRepository = $productRepository;
        $this->stockService = $stockService;
        $this->orderRepository=$orderRepository;
        $this->orderService=$orderService;
        $this->presenter = $presenter;
    }

    public function constructMenu()
    {
        $data['category'] = $this->categoryRepository->getAll();
        $data['food'] = $this->foodRepository->getAll();
        return $data;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // $user = ['email' => "amar@gmail.com", 'name' => 'monsieur ammar'];
        //   Mail::to("amardjebabla10@test.com")->send(new testMail($user));
        // Mail::to("amardjebabla10@test.com")->send(new testMarkDownEmail());
        $factory = new productFactoryAction($this->productRepository, $this->foodRepository, $this->platRepository, $this->packProduct);
        $factory->getProducts();
        $menu = $this->constructMenu();
        return $this->presenter->handle(['name' => 'backend.bill.index', 'data' => $menu]);
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
        $bill = $this->Repository->create($dto);
        return $bill;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request,$id)
    {

        //assets
        $settings = $this->settingsRepository->getOne();
        $image = json_decode($settings->options, true);
        $order=$this->orderRepository->getById($id);
        $orderItems=$order->orderItems($id);



       //extracted on endpoint
     /*   $productsIds = explode(',', $ids);
        $products = $this->productRepository->getStocks($productsIds);
        $this->stockService->updateStock($products,$this->inventoryRepository);*/
        // i will use here a foreach than i will think on optimizing it 
        //WE NEED TO GET order Item products
        // orderItems[]=>orderItem

        return $this->presenter->handle(['name' => 'backend.bill.show', 'data' => ['settings' => $settings, 'image' => $image, 'orderItems' => $orderItems]]);
    }
}
