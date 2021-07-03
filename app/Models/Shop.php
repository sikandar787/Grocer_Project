<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shop extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'ur_name',
        'description',
        'ur_description',
        'number',
        'password',
        'email',
        'image',
        'latitude',
        'longitude',
        'address',
        'coverage_km',
        'city_id',
        'area_id',
    ];

    public function cities() {
        return $this->hasOne('App\Models\City', 'id', 'city_id');
    }

    public function areas() {
        return $this->hasOne('App\Models\Area', 'id', 'area_id');
    }
}
