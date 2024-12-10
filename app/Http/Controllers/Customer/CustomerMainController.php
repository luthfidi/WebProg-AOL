<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Transaction;
use App\Models\User;
use Auth;
use Illuminate\Support\Facades\Mail;
use App\Mail\RentBookEmail;

class CustomerMainController extends Controller
{
    //
    public function index(){
        $products = Product::with('images')->get();
        return view('customer.profile', compact('products'));
    }
    public function history(){
        $user = auth()->user();
        $transactions = $user->transactions()->with('book')->get();
        return view('customer.history', compact('transactions'));
    }
    public function payment(){
        return view('customer.payment');
    }

    public function show($id){
        $books = Product::find($id);
        return view('customer.show',compact('books'));
    }

    public function rentBook($id)
    {
        // Find the book based on the provided ID
        $book = Product::findOrFail($id);

        // Get the currently authenticated user
        $user = auth()->user();

        // Calculate the rental price (you can use regular or discounted price, depending on your logic)
        $price = $book->discounted_price ?? $book->regular_price;

        // Create the transaction record
        $transaction = new Transaction();
        $transaction->user_id = $user->id;
        $transaction->book_id = $book->id;
        $transaction->total_price = $price;  // Store the rental price here
        $transaction->save();

        // Send an email to the user notifying them of the book rental
        Mail::to($user->email)->send(new RentBookEmail($book->product_name, $user->name));

        // Return a success message
        return redirect()->back()->with('success', 'The book rental email has been sent and the transaction has been recorded!');
    }

}
