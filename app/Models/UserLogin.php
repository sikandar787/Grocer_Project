<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserLogin extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'latitude',
        'longitude'
    ];

    public function userlocation()
    {
        return $this->hasOne('App\Models\UserLogin', 'id', 'user_id');
    }
}
