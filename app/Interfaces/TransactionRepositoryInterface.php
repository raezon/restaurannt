<?php
namespace App\Interfaces;
use Illuminate\Http\Request;

interface TransactionRepositoryRepositoryInterface 
{
    public function getAllTransaction();
    public function getTransactionById($transactionId);
    public function deleteTransactionById($transactionId);
    public function createTransaction(array $transaction) ;
    public function updateTransaction($transactionId, array $transaction);
}

