<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'ur_name',
        'description',
        'ur_descripton',
        'cat_id',
        'price',
        'discount_price',
        'max_limit',
        'weight',
        'unit_id',
        'status',
        'total_sold',
        'is_featured',
        'shop_id',
        'image'
    ];

    public function categories() {
        return $this->hasOne('App\Models\Category', 'id', 'category_id');
    }

    public function units() {
        return $this->hasOne('App\Models\Unit', 'id', 'unit_id');
    }
}
