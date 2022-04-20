<?php

namespace App\Interfaces;

use Illuminate\Http\Request;
interface CustomerRepositoryRepositoryInterface 
{
    public function getAllCustomers();
    public function getCustomerById($customerId);
    public function deleteCustomerById($customerId);
    public function createCustomer(array $customer) ;
    public function updateCustomer($customerId, array $customer);
}