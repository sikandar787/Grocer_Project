<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\City;
use App\Models\Shop;
use App\Models\Area;
use App\Models\Category;
use App\Models\Unit;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ApiController extends Controller
{
    public function getProductsApi()
    {
        $products = Product::get();
        return $products;
    }

    // public function getAreasApi()
    // {
    //     $areas = Area::get();
    //     return $areas;
    // }

    public function getShopsApi()
    {
        $shops = Shop::get();
        return $shops;
    }

    // public function getCitiesApi()
    // {
    //     $cities = City::get();
    //     return $cities;
    // }

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

    public function getAdminLoginApi(Request $request)
    {
        $admins = new Admin();
        $admin = Admin::where('email',$request->email)->get();

        if(!$admin->isEmpty())
        {
            if(Hash::check($request->password, $admin[0]->password))
            {
                // $token = $admin[0]->createToken('MyProject')->accessToken;
                $data = $admin;
                // $data[0]['token'] = $token;

                return response()->json([
                    'status' => 1,
                    'message' => 'Successfully logged in',
                    'data' => $data
                ]);
            }
            else{
                return response()->json([
                    'status' => 0,
                    'message' => 'Wrong password, try again',
                    'data' => []
                ]);
            }

        }
        else{
            return response()->json([
                'status' => 0,
                'message' => 'Wrong email, try again',
                'data' => []
            ]);
        }
    }

    public function getCitiesAreasApi()
    {
        $cities = City::with('areas')->get();
        // return $cities;
        $abc = [];

        foreach($cities as $index => $city)
        {
            $abc[$index]['city-name'] = $city->name;
            $abc[$index]['area-name'] = $city->areas[0]->name;
        }

        return $abc;
        return response([
            'Cities with Areas' => $abc,
        ]);
    }

    public function userRegistrationApi(Request $request)
    {
        $users = new User();
        $users->name = $request->name;
        $users->email = $request->email;
        $users->password = Hash::make($request->password);
        $users->phone_number = $request->phone_number;
        $users->complete_address = $request->complete_address;
        $users->city_id = $request->city_id;
        $users->area_id = $request->area_id;
        $users->save();
        return response(['Success', 'User registered successfully']);
    }
}
