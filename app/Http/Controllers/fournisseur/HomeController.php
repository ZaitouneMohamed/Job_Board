<?php

namespace App\Http\Controllers\fournisseur;

use App\Http\Controllers\Controller;
use App\Models\Annonce;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function users_pending_on_job($id)
    {
        $annonce = Annonce::find($id);
        return view('fournisseur.annonces.users_on_annonce',compact('annonce'));
    }
}
