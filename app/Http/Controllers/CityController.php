<?php

namespace App\Http\Controllers;
use App\Models\City;
use App\Models\Area;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CityController extends Controller
{
    public function addCity(Request $request){

        $this->validate($request,[
            'name' => 'required|unique:cities',
            'ur_name'=> 'required|unique:cities',
            'latitude'=> 'required|unique:cities',
            'longitude'=> 'required|unique:cities'
        ]);

        $city = new City();
        $city->Create($request->except('_token'));
        // $city -> latitude = $request->latitude;
        // $city -> longitude = $request->longitude;
        // $city -> save();
        return redirect('view-cities');

    }

    public function viewCities(){
        $cities = City::orderBy('id', 'DESC')->get();
        return view ('admin.view-cities', compact('cities'));
    }

    public function destroyCities($id)
    {
        $cityAreas = Area::where('city_id', $id)->get();
        if($cityAreas->isEmpty()){
            City::where('id',$id)->delete();
            return back()->with('City_deleted', 'Your record has been deleted');
        }
        else{
            return back()->with('error', 'Delete Corresponding Areas before deleting this city');
        }
        
    }

    public function editCity($id)
    {
        $city =  City::find($id);

        return view('admin.edit-city', compact('city'));
    }




    public function updateCity($id,Request $req)
    {
         $unit = City::find($id);

        //  $this->validate($req,[
        //     'name' => 'required|unique:cities',
        //     'ur_name'=> 'required|unique:cities',
        //     'latitude'=> 'required|unique:cities',
        //     'longitude'=> 'required|unique:cities'
        // ]);

        $unit->Update($req->except('_token'));
        return redirect('view-cities');

     }
     public function statusUpdateCity( $id)
     {
        $city = DB::table('cities')->select('status')->where('id', $id)->first();


        if($city->status == '1'){
            $status= '0';

        }else{
            $status= '1';
        }

        $values= array('status'=> $status);
        DB::table('cities')->where('id', $id)->update($values);
        session()->flash('msg', 'City Status Updated Successfully');
        return redirect('view-cities');
     }
}
