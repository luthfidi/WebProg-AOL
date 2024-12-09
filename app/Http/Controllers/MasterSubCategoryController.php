<?php

namespace App\Http\Controllers;

use App\Models\Subcategory;
use Illuminate\Http\Request;

class MasterSubCategoryController extends Controller
{
    //
    public function storesubcat(Request $request){
        $validate_data = $request->validate([
            "subcategory_name"=> "unique:subcategories|max:100",
            "category_id"=> "required|exists:categories,id",
            ]) ;
            Subcategory::create($validate_data);
            return redirect()->back()->with("success","Sub Category Added Successfully!");
    }
    public function show($id){
        $subcategory_info = Subcategory::find($id);
        return view('admin.sub_category.edit',compact('subcategory_info'));
    }

    public function update(Request $request, $id){
        $subcategory = Subcategory::findOrFail($id);
        $validate_data = $request->validate([
            "subcategory_name"=> "unique:subcategories|max:100",
            ]) ;
        $subcategory->update($validate_data);
        return redirect()->back()->with('success','Sub Cattegory Updated Succesfully!');
    }

    public function delete ($id){
        Subcategory::findOrFail($id)->delete();
        return redirect()->back()->with('success','Sub Cattegory Deleted Succesfully!');

    }
}
