<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\DefaultAttribute;
use Illuminate\Http\Request;

class ProductAttributeController extends Controller
{
    //
    public function index(){
        return view('admin.product_attribute.create');
    }
    public function manage(){
        $allattributes = DefaultAttribute::all();
        return view('admin.product_attribute.manage', compact('allattributes'));
    }

    public function createattribute(Request $request){
        $validate_data = $request->validate([
            'attribute_value' => 'required|unique:default_attributes|max:100'
        ]);
        DefaultAttribute::create($validate_data);
        return redirect()->back()->with('success','Default Attribute Added Succesfully!');
    }

    public function show($id){
        $attributes = DefaultAttribute::find($id);
        return view('admin.product_attribute.edit',compact('attributes'));
    }

    public function update(Request $request, $id){
        $category = DefaultAttribute::findOrFail($id);
        $validate_data = $request->validate([
            'attribute_value' => 'required|unique:default_attributes|max:100'
        ]);
        $category->update($validate_data);
        return redirect()->back()->with('success','Attribute Updated Succesfully!');
    }

    public function delete(Request $request, $id){
        DefaultAttribute::findOrFail($id)->delete();
        return redirect()->back()->with('success','Attribute Deleted Succesfully!');

    }



}
