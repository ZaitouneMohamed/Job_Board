<?php

namespace App\Http\Livewire\Admin;

use App\Models\Categorie;
use Livewire\Component;
use Livewire\WithPagination;

class Categories extends Component
{
    protected $paginationTheme = 'bootstrap';

    public $categories , $name;
    use WithPagination;
    public function render()
    {
        return view('livewire.admin.categories');
    }


    public function getCategoriesProperty() {
        return Categorie::select('id','name')->paginate(4);
    }

    public function add()
    {
        $this->validate();
        Categorie::create([
            "name" => $this->name
        ]);
        // $this->get_categories();
        $this->name = "";
    }

    public function delete($id){
        Categorie::find($id)->delete();
        $this->name = "";
        $this->get_categories();

    }


    protected $rules = [
        'name' => 'required',
    ];



}
