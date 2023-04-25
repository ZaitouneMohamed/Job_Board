<?php

namespace App\Http\Livewire\Fournisseur\Annonces;

use App\Models\Annonce;
use App\Models\Tags;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    public $title, $nature, $salary, $description, $company, $categorie, $qualification, $duration, $responsibility, $etudes;
    protected $paginationTheme = 'bootstrap';
    use WithPagination;
    public function render()
    {
        return view('livewire.fournisseur.annonces.index');
    }

    public function getAnnoncesProperty() {
        return Annonce::select('id','title', 'nature', 'salary', 'description', 'company_id', 'categorie_id', 'qualification', 'duration', 'responsibility', 'niveau_etude','visits')->latest()->where('user_id',auth()->user()->id)->paginate(5);
    }


    public function add() {
        $this->validate();
        Annonce::create([
            "title" => $this->title,
            "nature" => $this->nature,
            "salary" => $this->salary,
            "description" => $this->description,
            "company_id" => $this->company,
            "categorie_id" => $this->categorie,
            "responsibility" => $this->responsibility,
            "qualification" => $this->qualification,
            "duration" => $this->duration,
            "niveau_etude" => $this->etudes,
            "user_id" => auth()->user()->id
        ]);
    }
    public function delete_tag($tag_id,$annonce_id)
    {
        $annonce = Annonce::find($annonce_id);
        $tag = Tags::find($tag_id);
        $annonce->tags()->detach($tag);
        $this->getAnnoncesProperty();
    }
    protected $rules = [
        'title' => 'required',
        'nature' => 'required',
        'salary' => 'required',
        'salary' => 'required',
        'description' => 'required',
        'company' => 'required',
        'categorie' => 'required',
        'qualification' => 'required',
        'duration' => 'required',
        'responsibility' => 'required',
        'etudes' => 'required',
    ];

}
