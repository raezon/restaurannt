<?php

namespace App\Interfaces;

use Illuminate\Http\Request;
interface CustomerRepositoryInterface 
{
    public function getAll();
    public function getById($customerId);
    public function deleteById($customerId);
    public function create(array $customer) ;
    public function update($customerId, array $customer);
}