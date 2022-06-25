<?php

namespace App\Repositories;

use App\Interfaces\Repositories\CustomerRepositoryInterface;
use Illuminate\Http\Request;
use App\Models\Customer;

class CustomerRepository implements CustomerRepositoryInterface 
{
    public function getAll() 
    {
      return Customer::all();
    }

    public function getById($customerId) 
    {
       
    }

    public function deleteById($customerId) 
    {
      
     
    }



    public function create(array $customer) 
    {
    
       

    }

    public function update($customerId, array $customer) 
    {
        
    }
}
