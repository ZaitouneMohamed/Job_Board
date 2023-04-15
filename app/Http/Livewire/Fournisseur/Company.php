<?php

namespace App\Http\Livewire\Fournisseur;

use App\Models\Company as ModelsCompany;
use Livewire\Component;
use Livewire\WithPagination;

class Company extends Component
{

    protected $paginationTheme = 'bootstrap';
    use WithPagination;
    public function render()
    {
        return view('livewire.fournisseur.company');
    }
    public $name, $adresse, $contact,$city , $email , $detail;

    public function getCategoriesProperty()
    {
        return ModelsCompany::select('id','city','name','adresse','email','detail','contact_info')->latest()->where('user_id',auth()->user()->id)->paginate(4);
    }

    public function add()
    {
        $this->validate();
        ModelsCompany::create([
            "name" => $this->name,
            "adresse" => $this->adresse,
            "email" => $this->email,
            "detail" => $this->detail,
            "city" => $this->city,
            "user_id" => auth()->user()->id,
            "contact_info" => $this->contact
        ]);
        $this->get_companys();
        $this->clear();
    }

    public function clear()
    {
        $this->name = '';
        $this->adresse = '';
        $this->contact = '';
    }

    


    protected $rules = [
        'name' => 'required',
        'adresse' => 'required',
        'email' => 'required|email',
        'detail' => 'required',
        'city' => 'required',
        'contact' => 'required',
    ];

    
}
