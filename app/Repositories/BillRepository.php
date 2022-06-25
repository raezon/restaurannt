<?php

namespace App\Repositories;


use App\Interfaces\Repositories\BillRepositoryInterface;
use Illuminate\Http\Request;
use App\Models\Billing;

class BillRepository implements BillRepositoryInterface
{

    public function getAll()
    {
        return Billing::all();
    }

    public function getById($id)
    {
        return Billing::find($id);
    }

    public function create(array $data)
    {
        return Billing::create($data);
    }

    public function update($id, array $data)
    {
        Billing::where('id', $id)->update($data);
    }

    public function deleteById($id)
    {
        return Billing::destroy($id);
    }
}
