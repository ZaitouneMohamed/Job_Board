<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User_info extends Model
{
    use HasFactory;

    protected $fillable = [
        'ville',
        'telephone',
        'sexe',
        'fonction',
        'experience',
        'user_id',
        'niveau_etudes',
        'cv',
        'disponibilite',
        'lettre',
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }
}
