<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Book;

class OrderController extends Controller
{
    public function showCart()
    {
        $cart = session()->get('cart', []);
        $total = array_reduce($cart, function ($carry, $item) {
            return $carry + ($item['price'] * $item['quantity']);
        }, 0);
        return view('cart', compact('cart', 'total'));
    }

    public function checkout(Request $request)
    {
        $cart = session()->get('cart', []);
        foreach ($cart as $id => $details) {
            Order::create([
                'book_id' => $id,
                'quantity' => $details['quantity'],
                'total_price' => $details['price'] * $details['quantity'],
                'payment_method' => $request->payment_method
            ]);
        }
        session()->forget('cart');
        return redirect('/');
    }
}
