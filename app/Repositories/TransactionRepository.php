<?php

namespace App\Repositories;

use App\Interfaces\TransactionRepositoryInterface;
use Illuminate\Http\Request;
use App\Models\Article;
use App\Models\Transaction;

class TransactionRepository implements TransactionRepositoryInterface 
{
    public function create(array $transaction)
    {
    }

    public function getAll()
    {
        return Transaction::all();
    }

    public function getById($transactionId)
    {
    }

    public function update($transactionId, array $transaction)
    {
    }

    public function delete($transactionId)
    {
    }
}
