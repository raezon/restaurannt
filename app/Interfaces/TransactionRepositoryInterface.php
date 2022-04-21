<?php
namespace App\Interfaces;
use Illuminate\Http\Request;

interface TransactionRepositoryInterface 
{
    public function getAll();
    public function getById($transactionId);
    public function delete($transactionId);
    public function create(array $transaction) ;
    public function update($transactionId, array $transaction);
}

