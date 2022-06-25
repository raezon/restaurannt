<?php
namespace App\Interfaces\Repositories;
use Illuminate\Http\Request;

interface TransactionRepositoryInterface 
{
    public function getAll();
    public function getById($transactionId);
    public function delete($transactionId);
    public function create(array $transaction) ;
    public function update($transactionId, array $transaction);
}

