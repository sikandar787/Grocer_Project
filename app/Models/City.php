<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    use HasFactory;
    protected $table= 'cities';
    protected $fillable= [
        'name',
        'ur_name',
        'latitude',
        'longitude'

    ];

    public function areas() {
        return $this->hasMany('App\Models\Area', 'id', 'city_id');
    }
}
