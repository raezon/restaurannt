<?php

namespace App\Actions;

use App\Interfaces\Repositories\ProductRepositoryInterface;

class ProductFactoryAction
{

    public function __construct(ProductRepositoryInterface $productRepository)
    {
        $this->productRepository = $productRepository;
    }
    public  function createProduct($type, $dto)
    {
        $dto['type'] = $type;
        switch ($type) {
            case 'food':
                $productId = $this->productRepository->create($dto);
                break;

            case 'plat':
                $productId = $this->productRepository->create($dto);
                break;
            case 'pack':
                $productId = $this->productRepository->create($dto);
                break;
        }

        return $productId;
    }
}
