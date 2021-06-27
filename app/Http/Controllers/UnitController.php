<?php

namespace App\Http\Controllers;

use App\Models\Unit;
use Illuminate\Http\Request;

class UnitController extends Controller
{




    public function addUnit(Request $request)
    {
        $this->validate($request,[
            'name' => 'required|unique:units',
        ]);


        $units = new Unit();
        $units -> name = $request->name;
        $units->save();
        return redirect('view-units');
    }

    public function viewUnits()
    {
        $units = Unit::orderBy('id','DESC')->get();
        return view('admin.view-units',compact('units'));
    }



    public function destroyUnit($id)
    {
        Unit::where('id',$id)->delete();
         return back()->with('Unit_deleted', 'Your record has been deleted');
    }



    public function editUnit($id)
    {
        $unit =  Unit::find($id);
        return view('admin.edit-unit', compact('unit'));
    }


    public function updateUnit($id,Request $req)
    {
         $unit = Unit::find($id);

         $this->validate($req,[
            'name' => 'required',
        ]);

        $unit->Update($req->except('_token'));
        return redirect('view-units');

     }


}
