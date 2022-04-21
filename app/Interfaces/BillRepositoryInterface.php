<?php

namespace App\Interfaces;

use Illuminate\Http\Request;
interface BillRepositoryInterface 
{
    public function getAll();
    public function getById($billId);
    public function deleteById($billId);
    public function create(array $bill) ;
    public function update($billId, array $bill);
}