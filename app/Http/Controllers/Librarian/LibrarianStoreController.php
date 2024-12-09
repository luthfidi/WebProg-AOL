<?php

namespace App\Http\Controllers\Librarian;

use App\Http\Controllers\Controller;
use App\Models\Store;
use Illuminate\Http\Request;

class LibrarianStoreController extends Controller
{
    //
    public function index(){
        return view('librarian.store.create');
    }
    public function manage(){
        $user_id = \Auth::user()->id;
        $stores = Store::where('user_id',$user_id)->get();
        return view('librarian.store.manage', compact('stores'));
    }
    public function store(Request $request){
        $validate_data = $request->validate([
            'store_name'=> 'unique:stores|max:100|min:3',
            'slug'=>'required|unique:stores',
            'details'=>'required'
        ]);
        Store::create([
            'store_name'=> $request->store_name,
            'slug'=> $request->slug,
            'details'=> $request->details,
            'user_id'=>\Auth::user()->id

        ]);

        return redirect()->back()->with('success','Store Created Succesfully!');
    }

    public function show($id){
        $store_info = Store::find($id);
        return view('librarian.store.edit',compact('store_info'));
    }

    public function update(Request $request, $id){
        $store = Store::findOrFail($id);
        $validate_data = $request->validate([
            'store_name'=> 'unique:stores|max:100|min:3',
            'slug'=>'required|unique:stores',
            'details'=>'required'
        ]);
        $store->update($validate_data);
        return redirect()->back()->with('success','Cattegory Updated Succesfully!');
    }

    public function delete(Request $request, $id){
        Store::findOrFail($id)->delete();
        return redirect()->back()->with('success','Cattegory Deleted Succesfully!');

    }




}

