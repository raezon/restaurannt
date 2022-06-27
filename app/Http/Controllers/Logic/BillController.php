<?php

namespace App\Http\Controllers\Logic;

use App\Http\Controllers\Controller;
use App\Http\Response\PresenterDispatcher;
use App\Interfaces\Repositories\SettingsRepositoryInterface;
use App\Interfaces\Repositories\BillRepositoryInterface;
use App\Interfaces\Repositories\CategoryRepositoryInterface;
use App\Interfaces\Repositories\ProductRepositoryInterface;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Http\JsonResponse;

//needs here to be polymophic
class BillController extends Controller
{
    public function __construct(BillRepositoryInterface $foodRepository, CategoryRepositoryInterface $categoryRepository, SettingsRepositoryInterface $settingsRepository, ProductRepositoryInterface $productRepository, PresenterDispatcher $presenter)
    {
        $this->foodRepository = $foodRepository;
        $this->categoryRepository = $categoryRepository;
        $this->settingsRepository = $settingsRepository;
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
        // return $request;
        $data['category'] = $this->categoryRepository->getAll();
        $data['food'] = $this->foodRepository->getAll();
        return $this->presenter->handle(['name' => 'backend.bill.index', 'data' => $data]);
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

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {

        $settings = $this->settingsRepository->getOne();
        $image = json_decode($settings->option, true);
        $ids = explode(',',$_POST['ids']);
        $products = $this->productRepository->getMany($ids);

        return $this->presenter->handle(['name' => 'backend.bill.show', 'data' => ['settings' => $settings, 'image' => $image, 'products' => $products]]);
    }
}
