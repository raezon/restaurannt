<?php
namespace App\Interfaces;
use Illuminate\Http\Request;

interface InvoicesRepositoryInterface 
{
    public function getAll();
    public function getById($invoiceId);
    public function deleteById($invoiceId);
    public function create(array $invoice) ;
    public function update($invoiceId, array $invoice);
}
