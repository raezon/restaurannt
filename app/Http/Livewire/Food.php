<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Food as Model;


class Food extends Component
{
    use WithPagination;

    public $paginate = 10;

    public $name;
   public $picture;
   public $created_at;
   public $updated_at;


    public $mode = 'create';

    public $showForm = false;

    public $primaryId = null;

    public $search;

    public $showConfirmDeletePopup = false;

    protected $rules = [
'name' => 'required',
'picture' => 'required',
'created_at' => 'required',
'updated_at' => 'required',

];



    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function render()
    {
        $model = Model::where('name', 'like', '%'.$this->search.'%')->orWhere('picture', 'like', '%'.$this->search.'%')->orWhere('created_at', 'like', '%'.$this->search.'%')->orWhere('updated_at', 'like', '%'.$this->search.'%')->latest()->paginate($this->paginate);
        return view('livewire.food', [
            'rows'=> $model
        ]);
    }


    public function create ()
    {
        $this->mode = 'create';
        $this->resetForm();
        $this->showForm = true;
    }


    public function edit($primaryId)
    {
        $this->mode = 'update';
        $this->primaryId = $primaryId;
        $model = Model::find($primaryId);

        $this->name= $model->name;
$this->picture= $model->picture;
$this->created_at= $model->created_at;
$this->updated_at= $model->updated_at;



        $this->showForm = true;
    }

    public function closeForm()
    {
        $this->showForm = false;
    }

    public function store()
    {
          $this->validate();

          $model = new Model();

             $model->name= $this->name;
$model->picture= $this->picture;
$model->created_at= $this->created_at;
$model->updated_at= $this->updated_at;
 $model->save();

          $this->resetForm();
          session()->flash('message', 'Record Saved Successfully');
          $this->showForm = false;
    }

    public function resetForm()
    {
        $this->name= "";
$this->picture= "";
$this->created_at= "";
$this->updated_at= "";

    }


    public function update()
    {
          $this->validate();

          $model = Model::find($this->primaryId);

             $model->name= $this->name;
$model->picture= $this->picture;
$model->created_at= $this->created_at;
$model->updated_at= $this->updated_at;
 $model->save();

          $this->resetForm();
           
          $this->showForm = false;
          
         session()->flash('message', 'Record Updated Successfully');
    }

    public function confirmDelete($primaryId)
    {
        $this->primaryId = $primaryId;
        $this->showConfirmDeletePopup = true;
    }

    public function destroy()
    {
        Model::find($this->primaryId)->delete();
        $this->showConfirmDeletePopup = false;
        session()->flash('message', 'Record Deleted Successfully');
    }

    public function clearFlash()
    {
        session()->forget('message');
    }

}
