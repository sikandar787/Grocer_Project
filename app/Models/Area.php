<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Area extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'ur_name',
        'city_id',
        'latitude',
        'longitude',
        'coverage_km',
        'status'
    ];
    
    public function cities(){
      return $this->hasOne('App\Models\City', 'id', 'city_id');  
    }
}
