<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;


class ProductController extends Controller
{
       // Show all products
    public function index()
    {
        $products = Product::orderByDesc('updated_at')->paginate(9);
        return view('welcome', compact('products'));
    }

    // Show a single product by ID
    public function show($id)
    {
        $product = Product::findOrFail($id);
        $title = $product->name;
        return view('products.show', compact('product', 'title'));
    }

    // Show the form to create a new product
    public function create()
    {
        return view('products.create'); // Ensure 'resources/views/products/create.blade.php' exists
    }

    // Filter products based on user inputs
    public function filter(Request $request)
    {
        $products = Product::query();

        // Apply filters if parameters exist in the request
        if ($request->has('category') && $request->category) {
            $products->where('category', $request->category);
        }

        if ($request->has('price_min') && $request->price_min) {
            $products->where('price', '>=', $request->price_min);
        }

        if ($request->has('price_max') && $request->price_max) {
            $products->where('price', '<=', $request->price_max);
        }

        if ($request->has('brand') && $request->brand) {
            $products->where('brand', $request->brand);
        }

        return view('products.index', ['products' => $products->get()]); // Reuse 'products.index' for listing filtered results
    }
}
