<?php
namespace App\Interfaces;
use Illuminate\Http\Request;

interface InvoicesRepositoryRepositoryInterface 
{
    public function getAllInvoices();
    public function getInvoiceById($invoiceId);
    public function deleteInvoiceById($invoiceId);
    public function createInvoice(array $invoice) ;
    public function updateInvoice($invoiceId, array $invoice);
}
