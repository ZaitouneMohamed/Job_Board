<?php

namespace App\Http\Livewire\Job;

use App\Models\Annonce;
use App\Models\User;
use Livewire\Component;

class Jobslist extends Component
{
    public $part_time_jobs , $full_time_jobs;
    public function render()
    {
        return view('livewire.job.jobslist');
    }

    public function mount()
    {
        $this->get_full_time_jobs();
        $this->get_part_time_jobs();
    }
    
    public function get_full_time_jobs()
    {
        $a = Annonce::all()->where("nature", "full time")->take(5);
        $this->full_time_jobs = $a;
    }
    public function get_part_time_jobs()
    {
        $a = Annonce::all()->where("nature", "part time")->take(5);
        $this->part_time_jobs = $a;
    }

    public function add_to_favorites($job_id , $user_id) {
        $job = Annonce::find($job_id);
        $user = User::find($user_id);
        $user->fav_job()->attach($job);
        $this->get_full_time_jobs();
        $this->get_part_time_jobs();
    }
    public function remove_from_favorites($job_id , $user_id) {
        $job = Annonce::find($job_id);
        $user = User::find($user_id);
        $user->fav_job()->detach($job);
        $this->get_full_time_jobs();
        $this->get_part_time_jobs();
    }
}
