<?php

namespace App\Http\Controllers;

use App\Models\Reader;
use App\Models\Book;
use Illuminate\Http\Request;

class ReaderController extends Controller
{
    public function viewReader(){
        $readers = Reader::all();
        return view('viewReader', compact('readers'));
    }

    public function viewBook(){
        $books = Book::all();
        return view('viewBook', compact('books'));
    }

    public function storeReader (Request $request, $id){
         

        $reader = Reader::create([
            'ReaderName'=>$request->ReaderName,
            'ReaderEmail'=>$request->ReaderEmail,
            'Address'=>$request->Address,
            'Shipping'=>$request->Shipping,
            'PaymentMethod'=>$request->PaymentMethod,
        ]);
        $book = Book::find($id);
        $book->readers()->attach($reader->id);
        $book->update([
            'Stock'=> ($book->Stock) - 1
        ]);
        return redirect('/collection'); 
    }

}
