<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function viewRecords (){

        $products= DB::table('products')->count();
        $categories= DB::table('categories')->count();
        $cities= DB::table('cities')->count();
        $areas= DB::table('areas')->count();
        $shops= DB::table('shops')->count();
        $banners= DB::table('banners')->count();
        return view('admin.dashboard', compact('products', 'categories', 'cities', 'areas','shops','banners'));
    }
}
