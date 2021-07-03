<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\City;
use App\Models\Shop;
use App\Models\Area;
use App\Models\Category;
use App\Models\Unit;
use App\Models\Product;
use Illuminate\Http\Request;

class ApiController extends Controller
{
    public function getProductsApi()
    {
        $products = Product::get();
        return $products;
    }

    public function getAreasApi()
    {
        $areas = Area::get();
        return $areas;
    }

    public function getShopsApi()
    {
        $shops = Shop::get();
        return $shops;
    }

    public function getCitiesApi()
    {
        $cities = City::get();
        return $cities;
    }

    public function getUnitsApi()
    {
        $units = Unit::get();
        return $units;
    }

    public function getCategoriesApi()
    {
        $categories = Category::get();
        return $categories;
    }
}
