<?php

namespace App\Http\Livewire\User\Job;

use Livewire\Component;

class Favorites extends Component
{
    public function render()
    {
        return view('livewire.user.job.favorites');
    }

    public function getJobsProperty ()
    {
        return auth()->user()->fav_job;
    }
}
