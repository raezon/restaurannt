<?php

namespace App\Interfaces;

use Illuminate\Http\Request;
interface BillRepositoryInterface 
{
    public function getAllBills();
    public function getBillById($billId);
    public function deleteBillById($billId);
    public function createBill(array $bill) ;
    public function updateBill($billId, array $bill);
}