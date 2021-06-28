<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'ur_name',
        'description',
        'ur_description',
        'image',
        'parent_id',
        'status'
    ];
}
