<?php

namespace App\Http\Livewire\Admin\Jobs;

use App\Models\Annonce;
use Livewire\Component;
use Livewire\WithPagination;

class FullList extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public function render()
    {
        return view('livewire.admin.jobs.full-list');
    }

    public function getAnnoncesProperty()
    {
        return Annonce::select('title', 'nature', 'salary', 'description', 'company_id', 'categorie_id','visits', 'qualification', 'duration', 'responsibility', 'niveau_etude','id')->paginate(5);
    }

}
