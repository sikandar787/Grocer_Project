<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
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

    public function getLoginApi(Request $request)
    {
        $users = new User();
        $user = User::where('email',$request->email)->get();

        if(!$user->isEmpty())
        {
            if(Hash::check($request->password, $user[0]->password))
            {
                // $token = $user[0]->createToken('MyProject')->accessToken;
                $data = $user;
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
}
