<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class CategoryController extends Controller
{
    public function addCategory(Request $req)
   {
        $category = new Category();

            $this->validate($req,[
                'name' => 'required',
                'ur_name' => 'required',
                'description' => 'required',
                'ur_description' => 'required',
                'image'        =>  'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            ]);
            $getUploadedName = HelperController::uplaodsingleImage($req->file('image'),'images/categories/');
            $category->image = $getUploadedName;
            $category->name = $req->name;
            $category->ur_name = $req->ur_name;
            $category->description = $req->description;
            $category->ur_description = $req->ur_description;
            $category->save();
        // $category->Create($req->except('_token'));
        return redirect('view-categories');
    }

    public function viewCategories()
    {
        $categories = Category::where('parent_id',0)->orderBy('id','DESC')->get();
        return view('admin.view-categories',compact('categories'));
    }

    public function deleteCategory($id)
    {
        $category =  new Category();
        $file = $category->where('id',$id)->first()->image;
        $image_directory = str_replace(URL("").'/',"",$file);
            if(File::exists($image_directory)) {
                File::delete($image_directory);
            }

        Category::where('id',$id)->delete();
        return back()->with('category_deleted', 'Your record has been deleted');
    }

    public function editCategory($id)
    {
        // $id = Auth::guard('admin')->user()->id;
        // $roleId= Admin::where('id',$id)->first()->role_id;
        // if($roleId== 1)
        // {

        $category =  Category::find($id);
        return view('admin.edit-category', compact('category'));

    // }else{
    //         // return back()->with('privilege', 'Your do not have any privilege to add product.');
    //         return redirect()->back()->with('privilege', 'You do not have any privilege to Edit Category.');
    //     }
    }

    public function updateCategory($id,Request $req)
    {

        $req->validate([
                'name' => 'required',
                'ur_name' => 'required',
                'description' => 'required',
                'ur_description' => 'required',
        ]);

        DB::beginTransaction();
        try{
            $category = Category::find($id);

            $old_image = str_replace(URL("").'/',"",$category->image);
            // return $old_image;

            $category->name = $req->name;

            if($req->image)
            {
                $getUploadedName = HelperController::uplaodsingleImage($req->file('image'),'images/categories/');
                $category->image = $getUploadedName;
                $image_path = $old_image;  // Value is not URL but directory file path
                if(File::exists($image_path)) {
                    File::delete($image_path);
    }
            }



            $category->save();
            DB::commit();


        } catch (\Exception $e) {
            DB::rollback();
            // something went wrong
        }

        return redirect('view-categories');
    }
    public function statusUpdateCategories( $id)
     {
        $category = DB::table('categories')->select('status')->where('id', $id)->first();


        if($category->status == '1'){
            $status= '0';

        }else{
            $status= '1';
        }

        $values= array('status'=> $status);
        DB::table('categories')->where('id', $id)->update($values);
        session()->flash('msg', 'Category Status Updated Successfully');
        return redirect('view-categories');
     }

}
