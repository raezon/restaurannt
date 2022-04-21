<?php

namespace App\Repositories;

use App\Interfaces\CustomerRepositoryInterface;
use Illuminate\Http\Request;
use App\Models\Article;

class CustomerRepository implements CustomerRepositoryInterface 
{
    public function getAllCustomers() 
    {
      
    }

    public function getCustomerById($customerId) 
    {
       
    }

    public function deleteCustomerById($customerId) 
    {
      
     
    }



    public function createCustomer(array $customer) 
    {
    
       

    }

    public function updateCustomer($customerId, array $customer) 
    {
        
    }
}
