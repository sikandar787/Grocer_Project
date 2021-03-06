<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\Banner;
use App\Models\City;
use App\Models\Shop;
use App\Models\Area;
use App\Models\Category;
use App\Models\Unit;
use App\Models\Product;
use App\Models\User;
use App\Models\UserLogin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ApiController extends Controller
{
    
    public function getProductsApi($id)
    {
        $products = Product::where('shop_id', $id)->get();
        if(!$products->isEmpty())
        {
         return $products;
        }
        else
        {
            return "No Products Found!";
        }
    }

    // public function getProductsApi()
    // {
    //     $products = Product::get();
    //     return $products;
    // }

    // public function getAreasApi()
    // {
    //     $areas = Area::get();
    //     return $areas;
    // }

    public function getOverallShopsApi()
    {
       $shops = Shop::where('location_status', 1)->get();
        if(!$shops->isEmpty())
        {
         return $shops;
        }
        else
        {
            return "No Shops Found!";
        }
    }
    
    public function getSpecificShopsApi()
    {
       $shops = Shop::where('location_status', 0)->get();
        if(!$shops->isEmpty())
        {
         return $shops;
        }
        else
        {
            return "No Shops Found!";
        }
    }

    // public function getCitiesApi()
    // {
    //     $cities = City::get();
    //     return $cities;
    // }

    public function getAreasbyCityApi($id)
    {
        $areas = Area::where('city_id', $id)->get();
        if(!$areas->isEmpty())
        {
         return $areas;
        }
        else
        {
            return "No Areas Found!";
        }
    }

    public function getUnitsApi()
    {
        $units = Unit::get();
         if(!$units->isEmpty())
        {
         return $units;
        }
        else
        {
            return "No Units Found!";
        }
    }

    public function getCategoriesApi()
    {
        $categories = Category::get();
        return $categories;
    }

//     public function getAdminLoginApi(Request $request)
//     {
//         $admins = new User();
//         $admin = User::where('email',$request->email)->get();
//    return 1;
//         if(!$user->isEmpty())
//         {
//             if(Hash::check($request->password, $admin[0]->password))
//             {
//                 // $token = $admin[0]->createToken('MyProject')->accessToken;
//                 $data = $admin;
//                 // $data[0]['token'] = $token;

//                 return response()->json([
//                     'status' => 1,
//                     'message' => 'Successfully logged in',
//                     'data' => $data
//                 ]);
//             }
//             else{
//                 return response()->json([
//                     'status' => 0,
//                     'message' => 'Wrong password, try again',
//                     'data' => []
//                 ]);
//             }

//         }
//         else{
//             return response()->json([
//                 'status' => 0,
//                 'message' => 'Wrong email, try again',
//                 'data' => []
//             ]);
//         }
//     }

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
    
    public function getBannersApi($id)
    {
       $banners = Banner::where('city_id', $id)->get();
        if(!$banners->isEmpty())
        {
         return $banners;
        }
        else
        {
            return "No Banners Found!";
        }
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

    public function userLoginApi(Request $request,$id,$latitude,$longitude)
    {
        // return $latitude;

        $users = User::get();
        $user = User::where('phone_number',$request->phone_number)->where('id', $id)->get(['phone_number','password']);
        if(!$user->isEmpty())
        {
            if(Hash::check($request->password, $user[0]->password))
            {
                $token = $user[0]->createToken('MyProject')->accessToken;
                $data = $user;
                $data[0]['token'] = $token;



                $userlogin = new UserLogin();
                $userlogin->user_id = $id;
                $userlogin->latitude = $latitude;
                $userlogin->longitude = $longitude;
                // return $userlogin;
                $userlogin->save();

                 return response()->json([
                    'status' => 1,
                    'message' => 'Successfully logged in',
                    'data' => $data
                ]);
            }
            else{
                return response()->json([
                    'status' => 0,
                    'message' => 'Wrong Password, try again',
                    'data' => []
                ]);
            }

        }
        else{
            return response()->json([
                'status' => 0,
                'message' => 'Wrong Phone Number, try again',
                'data' => []
            ]);
        }
    }
} //class bracket ends
