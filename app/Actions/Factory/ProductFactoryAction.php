<?php

namespace App\Actions\Factory;

use App\Interfaces\Repositories\FoodRepositoryInterface;
use App\Interfaces\Repositories\PlatRepositoryInterface;
use App\Interfaces\Repositories\ProductPackRepositoryInterface;
use App\Interfaces\Repositories\ProductRepositoryInterface;
use App\Repositories\PackProductRepository;

class ProductFactoryAction
{

    public function __construct(ProductRepositoryInterface $productRepository, FoodRepositoryInterface $foodRepository, PlatRepositoryInterface $platRepository, ProductPackRepositoryInterface $packProduct)
    {
        $this->productRepository = $productRepository;
        $this->foodRepository = $foodRepository;
        $this->platRepository = $platRepository;
        $this->packProduct = $packProduct;
    }

    public  function createProduct($type, $dto,$pictureName)
    {
        $dto['type'] = $type;

        switch ($type) {
            case 'food':
                $result = $this->productRepository->create($dto,$pictureName);
                break;

            case 'plat':
                $result = $this->productRepository->create($dto,$pictureName);
                break;
            case 'pack':
                $result = $this->productRepository->create($dto,$pictureName);
                break;
        }

        return $result;
    }
    public function getProducts()
    {
        $foods = $this->foodRepository->getAll();
        $plats = $this->platRepository->getAll();
        $packs = $this->packProduct->getAll();
        $result = [];
        foreach ($foods as $food) {
            array_push($result, $food);
        }
        foreach ($plats as $plat) {
            array_push($result, $plat);
        }
        foreach ($packs as $pack) {
            array_push($result, $pack);
        }
        return $result;
    }
}
