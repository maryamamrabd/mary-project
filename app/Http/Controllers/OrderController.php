<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function checkout(Request $request)
    {
        $cart = session()->get('cart', []);
        // Logic for payment and order storage
        session()->forget('cart');

        return redirect()->route('products.index')->with('success', 'Order placed successfully.');
    }
}