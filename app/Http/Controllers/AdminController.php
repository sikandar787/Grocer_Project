<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class AdminController extends Controller
{

    // public function index()
    // {
    //     return view('admin.login');
    // }


    public function customLogin(Request $request)
    {
        $this->validate($request,[
            'email' => 'required',
            'password' => 'required',
        ]);

        // return $request->session();
        // mujay tw visual code ko error la raha hai
        $credentials = $request->only('email', 'password');
        // return \Hash::make(123456789);
        if (Auth::guard('admin')->attempt($credentials)) {
           // return auth()->guard('admin')->user();
            return redirect()->intended('dashboard');
        }
        else{
            return redirect("login")->with('message', 'Login details are not valid!');
        }
    }
    public function signOut() {
        Session::flush();
        Auth::logout();

        return redirect("/");
    }


    // Admin Profile Functions

    public function editProfile()
    {
        $id = Auth::guard('admin')->user()->id;
        // return $id;
       $profile =  Admin::find($id);
        return view('admin.edit-profile', compact('profile'));
    }

    public function updateProfile(Request $req)
    {

        $this->validate($req,[
            'name' => 'required',
            'email' => 'required',
            'phone' => 'required',

        ]);

            $id = Auth::guard('admin')->user()->id;
            $admin = Admin::find($id);
            $admin->name = $req->name;
            $admin->email = $req->email;
            $admin->phone = $req->phone;
            if($req->new_password) {
                 $admin->password = Hash::make($req->new_password);
                 Session::flush();
                 Auth::logout();
                 $admin->save();
            return redirect("login")->with('password-update', 'Password Update Please Login With New Password');
            }
            $admin->save();
            return redirect("dashboard")->with('update-profile', 'Your profile has been updated!');
    }



    // Function to view Record On Dashboard
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
