<?php

namespace App\Http\Controllers\job;

use App\Http\Controllers\Controller;
use App\Models\Annonce;
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

    public function search(Request $request)
    {
        $keyword = $request->keyword;
        $categorie = $request->categorie;
        // $annonces = Annonce::select('id','title','company_id','nature','salary','created_at')
        $annonces = Annonce::where("title" , "Like" , "%{$keyword}%")
                    ->where("categorie_id" ,  $categorie)
                    ->paginate(5);
        return view('job.search',compact("annonces"));
    }


}
