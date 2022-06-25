<?php
namespace App\Interfaces\Repositories;
use Illuminate\Http\Request;

interface ReportsRepositoryInterface 
{
    public function getAll();
    public function getById($reportId);
    public function delete($reportId);
    public function create(array $report) ;
    public function update($reportId, array $report);
}

