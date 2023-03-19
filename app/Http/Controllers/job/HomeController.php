<?php

namespace App\Http\Controllers\job;

use App\Http\Controllers\Controller;
use App\Models\Annonce;
use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function job_details($id)
    {
        $job = Annonce::find($id);
        $job->increment('visits');
        // event(new viewIncrement($job));
        return view('job.job_detail',compact("job"));
    }

    
}
