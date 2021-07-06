<?php

namespace App\Http\Controllers;

use App\Models\Area;
use App\Models\City;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class UserController extends Controller
{
    // public function addUser(Request $request)
    // {
    //     $this->validate($request,[
    //         'name'=>'required',
    //         'email'=>'required'|'unique',
    //         'password'=>'required',
    //         'number'

    //     ]);
    // }

    public function getCities()
    {
        $cities = City::get();
        $areas = Area::get();
        return view('admin.view-users')->with(compact('cities', 'areas'));
    }

    public function viewUsers()
    {
        $users = User::orderBy('id','desc')->get();
        return view('admin.view-users', compact('users'));
    }

    // public function statusUpdateUsers($id)
    // {
    //    $user = DB::table('users')->select('status')->where('id', $id)->first();


    //    if($user->status == '1'){
    //        $status= '0';

    //    }else{
    //        $status= '1';
    //    }

    //    $values= array('status'=> $status);
    //    DB::table('users')->where('id', $id)->update($values);
    //    session()->flash('success', 'User Status Updated Successfully');
    //    return redirect('view-users');
    // }

    public function updateUserStatus($id)
    {
         $user = User::find($id);

        //  $this->validate($req,[
        //     'name' => 'required|unique:cities',
        //     'ur_name'=> 'required|unique:cities',
        //     'latitude'=> 'required|unique:cities',
        //     'longitude'=> 'required|unique:cities'
        // ]);
        return view('admin.changeuserstatus', compact('user'));

     }

    public function changeUserStatus(Request $req, $id)
    {
        $status = User::find($id);

        $this->validate($req, [
            'status' => 'required',
        ]);

        $status->status = $req->status;
        $status->save();


        return redirect('view-users');

     }
}
