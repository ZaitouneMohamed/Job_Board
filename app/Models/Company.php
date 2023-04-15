<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'city',
        'adresse',
        'email',
        'detail',
        'user_id',
        'contact_info',
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }
}
