<?php
namespace App\Interfaces;
use Illuminate\Http\Request;

interface InvoicesRepositoryInterface 
{
    public function getAll();
    public function getById($invoiceId);
}
