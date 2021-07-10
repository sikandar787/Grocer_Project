<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Banner extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'ur_name',
        'image',
        'category_id',
        'shop_id',
        'product_id',
    ];

    public function categories() {
        return $this->hasOne('App\Models\Category', 'id', 'category_id');
    }

    public function shops() {
        return $this->hasOne('App\Models\Shop', 'id', 'shop_id');
    }

    public function products() {
        return $this->hasOne('App\Models\Product', 'id', 'product_id');
    }
    
    public function cities() {
        return $this->hasOne('App\Models\City', 'id', 'city_id');
    }
}
