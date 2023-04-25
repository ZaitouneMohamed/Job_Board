<?php

namespace App\Http\Livewire\Admin\Jobs;

use App\Models\Annonce;
use App\Models\Tags;
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
        return Annonce::paginate(5);
    }

    public function delete_tag($tag_id,$annonce_id)
    {
        $annonce = Annonce::find($annonce_id);
        $tag = Tags::find($tag_id);
        $annonce->tags()->detach($tag);
        $this->getAnnoncesProperty();
    }

}
