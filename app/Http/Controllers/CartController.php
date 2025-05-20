<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use Illuminate\Http\Request;
use Gloudemans\Shoppingcart\Facades\Cart;

class CartController extends Controller
{
    public function index()
    {
        return view('cart.index');
    }

    public function add(Request $request, $rowId)
    {
        $request->validate([
            'quantity' => 'required|integer|min:1',
        ]);

        $product = Product::find($rowId);

        $cart = [
            'id' => $rowId,
            'name' => $product->name,
            'qty' => $request->quantity,
            'price' => $product->price,
            'options' => [
                'image' => $product->images->first()->path ?? null,
            ],
        ];

        Cart::add($cart);
        return redirect()->route('products.show', $rowId);
    }


    public function update(Request $request, $rowId)
    {
        $request->validate([
            'quantity' => 'required|integer|min:1',
        ]);

        if ($request->has('increase')) {
            $currentQty = Cart::get($rowId)->qty;
            Cart::update($rowId, $currentQty + 1);
        } elseif ($request->has('decrease')) {
            $currentQty = Cart::get($rowId)->qty;
            if ($currentQty > 1) {
                Cart::update($rowId, $currentQty - 1);
            }
        } else {
            Cart::update($rowId, $request->quantity);
        }

        return redirect()->route('cart.index')->with('success', 'Cart updated successfully!');
    }

    public function remove($rowId)
    {
        Cart::remove($rowId);

        return redirect()->route('cart.index')->with('success', 'Item removed from cart!');
    }

    /**
     * Clear the entire cart.
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function clear()
    {
        Cart::destroy();

        return redirect()->route('cart.index')->with('success', 'Cart cleared successfully!');
    }

    public function process(Request $request)
    {


        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|string|max:20',
            'address' => 'required|string|max:1000',
            'city' => 'required|string|max:255',
        ]);

        $order = Order::create([
            'user_id' => auth()->id(),
            'full_name' => $request->name,
            'address' => $request->address,

            'email' => $request->email,
            'phone' => $request->phone,
            'total' => Cart::total(),
            'city' => $request->city,
            'status' => 'En attente',
        ]);

        foreach (Cart::content() as $item) {
            OrderItem::create([
                'order_id' => $order->id,
                'product_id' => $item->id,
                'quantity' => $item->qty,

            ]);
        }


        Cart::destroy();

        return redirect()->route('cart.confirmation', $order->id)
            ->with('success', 'Votre commande a été passée avec succès!');
    }

    public function confirmation($orderId)
    {
        $order = Order::with('orderItems')->findOrFail($orderId);

        return view('cart.confirmation', compact('order'));
    }





}

