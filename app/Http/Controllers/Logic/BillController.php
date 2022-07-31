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
use App\Mail\testMail;
use App\Mail\testMarkDownEmail;
use App\Notifications\StockAlertNotification;
use App\Repositories\InventoryRepository;
use App\Services\StockService;
use Illuminate\Support\Facades\Mail;

//needs here to be polymophic
class BillController extends Controller
{
    public function __construct(FoodRepositoryInterface $foodRepository, PlatRepositoryInterface $platRepository, ProductPackRepositoryInterface $packProduct, CategoryRepositoryInterface $categoryRepository, SettingsRepositoryInterface $settingsRepository, ProductRepositoryInterface $productRepository, StockService $stockService, InventoryRepository $inventoryRepository, PresenterDispatcher $presenter)
    {
        $this->foodRepository = $foodRepository;
        $this->platRepository = $platRepository;
        $this->packProduct = $packProduct;
        $this->inventoryRepository = $inventoryRepository;
        $this->categoryRepository = $categoryRepository;
        $this->settingsRepository = $settingsRepository;
        $this->productRepository = $productRepository;
        $this->stockService = $stockService;
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
    public function show(Request $request)
    {
        //assets
        //getAssets
        $settings = $this->settingsRepository->getOne();
        $image = json_decode($settings->option, true);
        $ids = explode(',', $_POST['ids']);
        //getStocks
        $products = $this->productRepository->getStocks($ids);
        //update stock
        return $this->stockService->updateStock($products);


        return $this->presenter->handle(['name' => 'backend.bill.show', 'data' => ['settings' => $settings, 'image' => $image, 'products' => $products]]);
    }
}
