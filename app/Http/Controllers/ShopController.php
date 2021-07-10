<?php

namespace App\Http\Controllers;

use App\Models\Area;
use App\Models\City;
use App\Models\Shop;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;


class ShopController extends Controller
{

    public function getCities()
    {
        $cities = City::get();
        $areas = Area::get();
        return view('admin.add-shop')->with(compact('cities', 'areas'));
    }

    public function addShop(Request $req)
   {
        $shop = new Shop();

            $this->validate($req,[
                'name' => 'required',
                'ur_name' => 'required',
                'description' => 'required',
                'ur_description' => 'required',
                'number' => 'required',
                'latitude' => 'required',
                'longitude' => 'required',
                'coverage_km' => 'required',
                'city_id' => 'required',
                // 'area_id' => 'required',
                'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            ]);
            $getUploadedName = HelperController::uplaodsingleImage($req->file('image'),'images/shops/');
            $shop->image = $getUploadedName;
            $shop->name = $req->name;
            $shop->ur_name = $req->ur_name;
            $shop->description = $req->description;
            $shop->ur_description = $req->ur_description;
            $shop->number = $req->number;
            $shop->latitude = $req->latitude;
            $shop->longitude = $req->longitude;
            $shop->address = $req->address;
            $shop->coverage_km = $req->coverage_km;
            $shop->city_id = $req->city_id;
            $shop->area_id = $req->area_id;
            $shop->location_status = $req->location_status;
            // $shop->image = $req->image;
            // return $shop;
            $shop->save();
        // $category->Create($req->except('_token'));
        return redirect('view-shops');
    }

    public function viewShops()
    {
        $shops = Shop::orderBy('id','DESC')->get();
        return view('admin.view-shops',compact('shops'));
    }

    public function deleteShop($id)
    {
        $shop =  new Shop();
        $file = $shop->where('id',$id)->first()->image;
        $image_directory = str_replace(URL("").'/',"",$file);
            if(File::exists($image_directory)) {
                File::delete($image_directory);
            }

        Shop::where('id',$id)->delete();
        return back()->with('shop_deleted', 'Your record has been deleted');
    }

    public function editShop($id)
    {
        // $id = Auth::guard('admin')->user()->id;
        // $roleId= Admin::where('id',$id)->first()->role_id;
        // if($roleId== 1)
        // {

        $cities = City::get();
        $areas = Area::get();
        $shop =  Shop::find($id);
        // return $shop;
        return view('admin.edit-shop', compact('shop', 'cities', 'areas'));

    // }else{
    //         // return back()->with('privilege', 'Your do not have any privilege to add product.');
    //         return redirect()->back()->with('privilege', 'You do not have any privilege to Edit Category.');
    //     }
    }

    public function updateShop($id,Request $req)
    {

        DB::beginTransaction();
        try{
            $shop = Shop::find($id);

            $old_image = str_replace(URL("").'/',"",$shop->image);
            // return $old_image;

            if($req->image)
            {
                $getUploadedName = HelperController::uplaodsingleImage($req->file('image'),'images/shops/');
                $shop->image = $getUploadedName;
                $image_path = $old_image;  // Value is not URL but directory file path
                if(File::exists($image_path)) {
                    File::delete($image_path);
                }
            }


            $shop->name = $req->name;
            $shop->ur_name = $req->ur_name;
            $shop->description = $req->description;
            $shop->ur_description = $req->ur_description;
            $shop->number = $req->number;
            $shop->latitude = $req->latitude;
            $shop->longitude = $req->longitude;
            $shop->address = $req->address;
            $shop->coverage_km = $req->coverage_km;
            $shop->city_id = $req->city_id;
            $shop->area_id = $req->area_id;
            $shop->location_status = $req->location_status;

            // return $shop;
            $shop->save();
            // $shop->Create($req->except('_token'));
            DB::commit();


        } catch (\Exception $e) {
            DB::rollback();
            // something went wrong
        }

        return redirect('view-shops');
    }

    public function getArea(Request $request){
        $cityID = $request->id;
        $areas = Area::where('city_id', '=', $cityID)->get();
        return $areas;
    }

    public function statusUpdateShops( $id)
    {
       $shop = DB::table('shops')->select('status')->where('id', $id)->first();


       if($shop->status == '1'){
           $status= '0';

       }else{
           $status= '1';
       }

       $values= array('status'=> $status);
       DB::table('shops')->where('id', $id)->update($values);
       session()->flash('success', 'Shop Status Updated Successfully');
       return redirect('view-shops');
    }

    public function getShops(Request $request){
        $areaId = $request->id;
        $shops = Shop::select('name','latitude','longitude')->where('area_id',$areaId)->get();
        return $shops;
    }

    public function getSpeceficShops(Request $request){
        $location = $request->id;
        $shops = Shop::where('location_status', $location)->get();
        return $shops;
    }

}
