<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\ProductImage;
use Illuminate\Http\Request;

class CustomerMainController extends Controller
{
    //
    public function index(){
        $products = Product::with('images')->get();
        return view('customer.profile', compact('products'));
    }
    public function history(){
        return view('customer.history');
    }
    public function payment(){
        return view('customer.payment');
    }
}
