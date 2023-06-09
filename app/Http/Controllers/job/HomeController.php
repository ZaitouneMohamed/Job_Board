<?php

namespace App\Http\Controllers\job;

use App\Http\Controllers\Controller;
use App\Models\Annonce;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function job_details(Annonce $annonce)
    {
        $annonce->increment('visits');
        return view('job.job_detail',compact("annonce"));
    }

    public function all_jobs()
    {
        $annonces = Annonce::paginate(15);
        return view('job.alljobs',compact('annonces'));
    }

    public function search(Request $request)
    {
        $keyword = $request->keyword;
        $categorie = $request->categorie;
        $city = $request->location;

        $annonces = Annonce::join('companies','companies.id','annonces.company_id')
                            ->Where("companies.city" ,  $city)
                            ->where("annonces.title" , "Like" , "%{$keyword}%")
                            ->Where("annonces.categorie_id" ,  $categorie)
                            ->get(['annonces.*']);
        return view('job.search',compact("annonces"));
    }

    public function job_on_tag()
    {
        
    }

}
