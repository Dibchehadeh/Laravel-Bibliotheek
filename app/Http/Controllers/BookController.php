<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;

class BookController extends Controller
{
    public function index()
    {
        $books = Book::all();
        return view('index', compact('books'));
    }

    public function addToCart(Request $request)
    {
        $book = Book::find($request->book_id);
        $cart = session()->get('cart', []);

        if(isset($cart[$book->id])) {
            $cart[$book->id]['quantity']++;
        } else {
            $cart[$book->id] = [
                "title" => $book->title,
                "price" => $book->price,
                "quantity" => 1
            ];
        }

        session()->put('cart', $cart);
        return redirect()->back();
    }
}
