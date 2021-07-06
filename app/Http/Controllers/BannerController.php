<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use App\Models\Category;
use App\Models\Shop;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class BannerController extends Controller
{
    public function getCategories()
    {
        $categories = Category::get();
        $shops = Shop::get();
        $products = Product::get();
        return view('admin.add-banner')->with(compact('categories', 'shops', 'products'));
    }

    public function addBanner(Request $req)
   {
        $banner = new Banner();

            $this->validate($req,[
                'name' => 'required',
                'ur_name' => 'required',
                'category_id' => 'required',
                'shop_id' => 'required',
                'product_id' => 'required',
                'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            ]);
            $getUploadedName = HelperController::uplaodsingleImage($req->file('image'),'images/banners/');
            $banner->image = $getUploadedName;
            $banner->name = $req->name;
            $banner->ur_name = $req->ur_name;
            $banner->category_id = $req->category_id;
            $banner->shop_id = $req->shop_id;
            $banner->product_id = $req->product_id;
            // return json_encode($banner);
            $banner->save();
        // $category->Create($req->except('_token'));
        return redirect('view-banners');
    }

    public function viewBanners()
    {
        $banners = Banner::with('categories', 'shops', 'products')->orderBy('id','DESC')->get();
        // return $banners;
        return view('admin.view-banners',compact('banners'));
    }

    public function deleteBanner($id)
    {
        $banner =  new Banner();
        $file = $banner->where('id',$id)->first()->image;
        $image_directory = str_replace(URL("").'/',"",$file);
            if(File::exists($image_directory)) {
                File::delete($image_directory);
            }

        Banner::where('id',$id)->delete();
        return back()->with('banner_deleted', 'Your record has been deleted');
    }

    public function editBanner($id)
    {
        // $id = Auth::guard('admin')->user()->id;
        // $roleId= Admin::where('id',$id)->first()->role_id;
        // if($roleId== 1)
        // {

        $categories = Category::get();
        $shops = Shop::get();
        $products = Product::get();
        $banner =  Banner::find($id);
        // return $banner;
        return view('admin.edit-banner', compact('banner', 'categories', 'shops', 'products'));

    // }else{
    //         // return back()->with('privilege', 'Your do not have any privilege to add product.');
    //         return redirect()->back()->with('privilege', 'You do not have any privilege to Edit Category.');
    //     }
    }

    public function updateBanner($id,Request $req)
    {

        // $req->validate([
        //         'name' => 'required',
        //         'ur_name' => 'required',
        //         'description' => 'required',
        //         'ur_description' => 'required',
        // ]);

        DB::beginTransaction();
        try{
            $banner = Banner::find($id);

            $old_image = str_replace(URL("").'/',"",$banner->image);
            // return $old_image;

            if($req->image)
            {
                $getUploadedName = HelperController::uplaodsingleImage($req->file('image'),'images/banners/');
                $banner->image = $getUploadedName;
                $image_path = $old_image;  // Value is not URL but directory file path
                if(File::exists($image_path)) {
                    File::delete($image_path);
    }
            }

            $banner->name = $req->name;
            $banner->ur_name = $req->ur_name;
            $banner->category_id = $req->category_id;
            $banner->shop_id = $req->shop_id;
            $banner->product_id = $req->product_id;

            $banner->save();
            DB::commit();


        } catch (\Exception $e) {
            DB::rollback();
            // something went wrong
        }

        return redirect('view-banners');
    }
    public function statusUpdateBanners( $id)
     {
        $banner = DB::table('banners')->select('status')->where('id', $id)->first();


        if($banner->status == '1'){
            $status= '0';

        }else{
            $status= '1';
        }

        $values= array('status'=> $status);
        DB::table('banners')->where('id', $id)->update($values);
        session()->flash('msg', 'Banner Status Updated Successfully');
        return redirect('view-banners');
     }

}
