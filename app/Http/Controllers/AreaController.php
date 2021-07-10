<?php

namespace App\Http\Controllers;

use App\Models\Area;
use App\Models\City;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

use function GuzzleHttp\Promise\all;

class AreaController extends Controller
{
    public function getCities()
    {
        $cities = City::get();
        return view('admin.view-areas');
    }
    public function addArea(Request $req)
   {
        $area = new Area();

            $this->validate($req,[
                'name' => 'required',
                'ur_name' => 'required',
                'latitude' => 'required',
                'longitude' => 'required',
                'coverage_km' => 'required',
            ]);
        $area->Create($req->except('_token'));
        return redirect('view-areas');
    }

    public function viewAreas()
    {
        $areas = Area::orderBy('id','DESC')->get();
        return view('admin.view-areas',compact('areas'));
    }

    public function deleteArea($id)
    {
        $area =  new Area();

        Area::where('id',$id)->delete();
        return back()->with('area_deleted', 'Your record has been deleted');
    }

    public function editArea($id)
    {
        // $id = Auth::guard('admin')->user()->id;
        // $roleId= Admin::where('id',$id)->first()->role_id;
        // if($roleId== 1)
        // {

        $area =  Area::find($id);
        $city = City::where('status',1)->where('id',$area->city_id)->first();
        return view('admin.edit-area', compact('area', 'city'));

    // }else{
    //         // return back()->with('privilege', 'Your do not have any privilege to add product.');
    //         return redirect()->back()->with('privilege', 'You do not have any privilege to Edit Category.');
    //     }
    }

    public function updateArea($id,Request $req)
    {

        $area = Area::find($id);

        // $this->validate($req,[
        //     'name' => 'required',
        //     'ur_name' => 'required',
        //     'coverage_km' => 'required',
        //     'city_id' => 'required'
        // ]);
        // return 10;
        // return $req->city_id;
        $area->name = $req->name;
        $area->ur_name = $req->ur_name;
        $area->coverage_km = $req->coverage_km;
          if($req->latitude || $req->longitude)
          {
            $area->latitude = $req->latitude;
            $area->longitude = $req->longitude;
          }
          $area->save();
        return redirect('view-areas');
    }

    public function enterArea(){
        $cities = City::where('status',1)->get();
        return view('admin.add-area')->with(compact('cities'));
    }
    public function statusUpdateAreas( $id)
    {
       $area = DB::table('areas')->select('status')->where('id', $id)->first();


       if($area->status == '1'){
           $status= '0';

       }else{
           $status= '1';
       }

       $values= array('status'=> $status);
       DB::table('areas')->where('id', $id)->update($values);
       session()->flash('msg', 'Area Status Updated Successfully');
       return redirect('view-areas');
    }

}
