<?php
namespace App\Interfaces\Repositories;
use Illuminate\Http\Request;

interface InvoicesRepositoryInterface 
{
    public function getAll();
    public function getById($invoiceId);
}
