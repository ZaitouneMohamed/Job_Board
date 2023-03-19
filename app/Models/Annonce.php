<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Annonce extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'nature',
        'salary',
        'description',
        'company_id',
        'user_id',
        'categorie_id',
        'responsibility',
        'qualification',
        'duration',
        'niveau_etude',
        'visits',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function company()
    {
        return $this->belongsTo(company::class);
    }
    public function categorie()
    {
        return $this->belongsTo(categorie::class);
    }
    public function getCreatedAtAttribute($value)
    {
        return Carbon::parse($value)->diffForHumans();
    }

    public function users()
    {
        return $this->belongsToMany(User::class,
            'pendings',
            'annonce_id',
            'user_id',
        );
    }
}
