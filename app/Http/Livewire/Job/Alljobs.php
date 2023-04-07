<?php

namespace App\Http\Livewire\Job;

use App\Models\Annonce;
use Livewire\Component;
use Livewire\WithPagination;


class Alljobs extends Component
{
    protected $paginationTheme = 'bootstrap';
    use WithPagination;

    public function render()
    {
        return view('livewire.job.alljobs');
    }

    public function getAnnoncesProperty()
    {
        return Annonce::paginate(20);
    }
}
