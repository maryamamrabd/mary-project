<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\Product;


class ProductController extends Controller
{

    public function index(Request $request)
    {
        $query = Product::with(['images', 'category'])->orderByDesc('updated_at');

        if ($request->category) {
            $query->where('category_id', $request->category);
        }

        if ($request->min_price && $request->max_price) {
            $query->whereBetween('price', [$request->min_price, $request->max_price]);
        }

        $products = $query->paginate(9);
        $categories = Category::all();

        return view('welcome', compact('products', 'categories'));
    }


    // Show a single product by ID
    public function show($id)
    {
        $product = Product::findOrFail($id);
        $title = $product->name;
        $categories = Category::paginate(6);
        return view('products.show', compact('product', 'title', 'categories'));
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
