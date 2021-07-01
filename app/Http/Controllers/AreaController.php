<?php

namespace App\Http\Controllers;

use App\Models\Area;
use App\Models\City;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class AreaController extends Controller
{
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
        $cities = City::where('status',1)->get();
        return view('admin.edit-area', compact('area', 'cities'));

    // }else{
    //         // return back()->with('privilege', 'Your do not have any privilege to add product.');
    //         return redirect()->back()->with('privilege', 'You do not have any privilege to Edit Category.');
    //     }
    }

    public function updateArea($id,Request $req)
    {
        $area = Area::find($id);
        $this->validate($req,[
            'name' => 'required',
            'ur_name' => 'required',
            'city_id' => 'required',
            'latitude' => 'required',
            'longitude' => 'required',
            'coverage_km' => 'required'
        ]);
        $area->Update($req->except('_token'));
        return redirect('view-areas');
    }

    public function enterArea(){
        $cities = City::where('status',1)->get();
        return view('admin.add-area')->with(compact('cities'));
    }

}
