<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\Annonce;
use App\Models\User;
use App\Models\User_info;
use Illuminate\Http\Request;

class homeController extends Controller
{
    public function profile()
    {
        return view('user.pages.profile');
    }

    public function edit_profile()
    {
        return view('user.pages.edit_profile');
    }

    public function my_favorites_jobs()
    {
        return view('user.pages.favorite_jobs');
    }

    public function my_pending_jobs()
    {
        return view('user.pages.pending_jobs');
    }

    public function apply_job($user_id, $job_id){
        $user = User::find($user_id);
        $job = Annonce::find($job_id);
        $user->job()->attach($job);
        return redirect()->back();
    }



    public function update_profile(Request $request)
    {
        if (auth()->user()->info) {
            $a = User_info::where('user_id', auth()->user()->id)->take(1);
            if ($request->has('cv')) {
                $cvv = $request->cv;
                $cv_name = time() . '_' . $cvv->getClientOriginalName();
                $cvv->move(public_path('worker/cv'), $cv_name);
                $a->update([
                    'cv' => $cv_name
                ]);
            }
            $a->update([
                "ville" => $request->ville,
                'telephone' => $request->telephone,
                'sexe' => $request->sexe,
                'fonction' => $request->fonction,
                'experience' => $request->experience,
                'niveau_etudes' => $request->niveau_etudes,
                'disponibilite' => $request->disponibilite,
                'lettre' => $request->lettre,
            ]);
            return redirect()->route('user.profile');
        } else {
            $cv = $request->cv;
            $cv_name = time() . '_' . $cv->getClientOriginalName();
            $cv->move(public_path('worker/cv'), $cv_name);
            user_info::create([
                "ville" => $request->ville,
                'telephone' => $request->telephone,
                'sexe' => $request->sexe,
                'fonction' => $request->fonction,
                'experience' => $request->experience,
                'niveau_etudes' => $request->niveau_etudes,
                'cv' => $cv_name,
                'disponibilite' => $request->disponibilite,
                'lettre' => $request->lettre,
                'user_id' => auth()->user()->id
            ]);
            return redirect()->route('user.profile');
        }
    }
}
