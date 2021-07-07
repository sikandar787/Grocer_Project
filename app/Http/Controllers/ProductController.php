<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\Unit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class ProductController extends Controller
{

    public function getCategories()
    {
        $categories = Category::get();
        $units = Unit::get();
        return view('admin.add-product')->with(compact('categories', 'units'));
    }

    public function addProduct(Request $req)
   {
        $product = new Product();

            $this->validate($req,[
                'name' => 'required',
                'ur_name' => 'required',
                'description' => 'required',
                'ur_description' => 'required',
                'category_id' => 'required',
                'price' => 'required',
                'max_limit' => 'required',
                'weight' => 'required',
                'unit_id' => 'required',
                'is_featured' => 'required',
                'image'        =>  'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            ]);
            $getUploadedName = HelperController::uplaodsingleImage($req->file('image'),'images/products/');
            $product->image = $getUploadedName;
            $product->name = $req->name;
            $product->ur_name = $req->ur_name;
            $product->description = $req->description;
            $product->ur_description = $req->ur_description;
            $product->category_id = $req->category_id;
            $product->price = $req->price;
            $product->discount_price = $req->discount_price;
            $product->max_limit = $req->max_limit;
            $product->weight = $req->weight;
            $product->unit_id = $req->unit_id;
            $product->location_status = $req->location_status;
            // $product->status = $req->status;
            $product->total_sold = $req->total_sold;
            $product->is_featured = $req->is_featured;
            $product->shop_id = $req->shop_id;
            $product->image = $req->image;
            // return $product;
            $product->save();
        // $product->Create($req->except('_token'));
        return redirect('view-products');
    }

    public function viewProducts()
    {
        $products = Product::with('categories', 'units')->orderBy('id','DESC')->get();
        // $categories = Category::where('status', 1)->get();
        // return $products;
        return view('admin.view-products',compact('products'));
    }

    public function deleteProduct($id)
    {
        $product =  new Product();
        $file = $product->where('id',$id)->first()->image;
        $image_directory = str_replace(URL("").'/',"",$file);
            if(File::exists($image_directory)) {
                File::delete($image_directory);
            }

        Product::where('id',$id)->delete();
        return back()->with('product_deleted', 'Your record has been deleted');
    }

    public function editProduct($id)
    {
        // $id = Auth::guard('admin')->user()->id;
        // $roleId= Admin::where('id',$id)->first()->role_id;
        // if($roleId== 1)
        // {

        $categories = Category::get();
        $units = Unit::get();
        $product =  Product::find($id);
        // $products = Product::with('categories', 'units')->orderBy('id','DESC')->get();
        return view('admin.edit-product', compact('product', 'categories', 'units'));

    // }else{
    //         // return back()->with('privilege', 'Your do not have any privilege to add product.');
    //         return redirect()->back()->with('privilege', 'You do not have any privilege to Edit Category.');
    //     }
    }

    public function updateProduct($id,Request $req)
    {
        DB::beginTransaction();
        try{
            $product = Product::find($id);

            $old_image = str_replace(URL("").'/',"",$product->image);
            // return $old_image;



            if($req->image)
            {
                $getUploadedName = HelperController::uplaodsingleImage($req->file('image'),'images/products/');
                $product->image = $getUploadedName;
                $image_path = $old_image;  // Value is not URL but directory file path
                if(File::exists($image_path)) {
                    File::delete($image_path);
    }
            }

            $product->name = $req->name;
            $product->ur_name = $req->ur_name;
            $product->description = $req->description;
            $product->ur_description = $req->ur_description;
            $product->category_id = $req->category_id;
            $product->price = $req->price;
            $product->discount_price = $req->discount_price;
            $product->max_limit = $req->max_limit;
            $product->weight = $req->weight;
            $product->unit_id = $req->unit_id;
            $product->location_status = $req->location_status;
            // $product->status = $req->status;
            $product->total_sold = $req->total_sold;
            $product->is_featured = $req->is_featured;
            // $product->shop_id = $req->shop_id;
            // $product->image = $req->image;
            // return $product;

            $product->save();
            DB::commit();


        } catch (\Exception $e) {
            DB::rollback();
            // something went wrong
        }

        return redirect('view-products');
    }

    public function statusUpdateProducts( $id)
    {
       $product = DB::table('products')->select('status')->where('id', $id)->first();


       if($product->status == '1'){
           $status= '0';

       }else{
           $status= '1';
       }

       $values= array('status'=> $status);
       DB::table('products')->where('id', $id)->update($values);
       session()->flash('success', 'Product Status Updated Successfully');
       return redirect('view-products');
    }
    public function productDetail($id){

        // $detail= DB::table('products')->find('id', $id)->get();
        $detail = Product::find($id);

        return view('admin.view-product-detail', compact('detail'));
    }

    public function updateChecked(Request $request){
        $arr = $request->id;
        $products = [];
        foreach($arr as $a){
            $product = Product::where('id', $a)->first();
            array_push($products, $product);
        }
        return view('admin.edit-checked',compact('products'));
    }

    public function editChecked(Request $request){
        $arr = $request->id;
        foreach($arr as $index => $id){
            $product = Product::find($id);
            $product->name = $request->name[$index];
            $product->price = $request->price[$index];
            $product->discount_price = $request->discount_price[$index];
            $product->update();
        }
        return redirect('view-products');
    }

}
