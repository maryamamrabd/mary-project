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

        // $query = Product::all();


        // Filter Category
        if ($request->category) {
            $query->where('category_id', $request->category);
        }

        // Filter Price
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
}
