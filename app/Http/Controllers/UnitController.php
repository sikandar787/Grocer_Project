<?php

namespace App\Http\Controllers;

use App\Models\Unit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
     public function statusUpdateUnit( $id)
     {
        $unit = DB::table('units')->select('status')->where('id', $id)->first();


        if($unit->status == '1'){
            $status= '0';

        }else{
            $status= '1';
        }

        $values= array('status'=> $status);
        DB::table('units')->where('id', $id)->update($values);
        session()->flash('msg', 'Unit Status Updated Successfully');
        return redirect('view-units');
     }
}
