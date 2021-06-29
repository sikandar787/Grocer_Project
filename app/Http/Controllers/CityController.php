<?php

namespace App\Http\Controllers;
use App\Models\City;
use Illuminate\Http\Request;

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
        $city -> latitude = $request->latitude;
        $city -> longitude = $request->longitude;
        $city -> save();
        return redirect('view-cities');

    }

    public function viewCities(){
        $cities = City::orderBy('id', 'DESC')->get();
        return view ('admin.view-cities', compact('cities'));
    }

    public function destroyCities($id)
    {
        City::where('id',$id)->delete();
         return back()->with('City_deleted', 'Your record has been deleted');
    }

    public function editCity($id)
    {
        $city =  City::find($id);

        return view('admin.edit-city', compact('city'));
    }




    public function updateCity($id,Request $req)
    {
         $unit = City::find($id);

         $this->validate($req,[
            'name' => 'required|unique:cities',
            'ur_name'=> 'required|unique:cities',
            'latitude'=> 'required|unique:cities',
            'longitude'=> 'required|unique:cities'
        ]);

        $unit->Update($req->except('_token'));
        return redirect('view-cities');

     }
}
