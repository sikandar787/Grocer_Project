<?php

namespace App\Http\Controllers;

use App\Models\Area;
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
                'city_id' => 'required',
                'latitude' => 'required',
                'longitude' => 'required',
                'coverage_km' => 'required',
            ]);
            // $area->name = $req->name;
            // $area->ur_name = $req->ur_name;
            // $area->description = $req->description;
            // $area->ur_description = $req->ur_description;
            // $area->save();
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
        return view('admin.edit-area', compact('area'));

    // }else{
    //         // return back()->with('privilege', 'Your do not have any privilege to add product.');
    //         return redirect()->back()->with('privilege', 'You do not have any privilege to Edit Category.');
    //     }
    }

    public function updateArea($id,Request $req)
    {
        $area = new Area();
        $req->validate([
                'name' => 'required',
                'ur_name' => 'required',
                'city_id' => 'required',
                'latitude' => 'required',
                'longitude' => 'required',
                'coverage_km' => 'required',
        ]);

        $area->save();

        return redirect('view-areas');
    }

}
