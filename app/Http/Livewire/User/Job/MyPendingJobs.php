<?php

namespace App\Http\Livewire\User\Job;

use Livewire\Component;

class MyPendingJobs extends Component
{
    public function render()
    {
        return view('livewire.user.job.my-pending-jobs');
    }

    public function getJobsProperty ()
    {
        return auth()->user()->job;
    }
}
