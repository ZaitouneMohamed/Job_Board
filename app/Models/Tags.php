<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tags extends Model
{
    use HasFactory;
    protected $fillable = [
        "name"
    ];
    public function annonces()
    {
        return $this->belongsToMany(
            Annonce::class,
            'annonces_tags',
            'tag_id',
            'annonce_id'
        );
    }
}
