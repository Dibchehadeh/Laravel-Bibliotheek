<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
use Illuminate\Database\QueryException;

class AdminController extends Controller
{
    public function index()
    {
        $books = Book::all();
        return view('admin', compact('books'));
    }

    public function store(Request $request)
    {
        Book::create($request->all());
        return redirect('/admin')->with('success', 'Book added successfully.');
    }

    public function destroy($id)
    {
        $book = Book::find($id);

        try {
            $book->delete();
            return redirect('/admin')->with('success', 'Book deleted successfully.');
        } catch (QueryException $e) {
            return redirect('/admin')->with('error', 'Cannot delete book because it is associated with existing orders.');
        }
    }
}
