<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    // 1. List all products
    public function index()
    {
        return response()->json(Product::all(), 200);
    }

    // 2. Add a new product
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string',
            'description' => 'nullable|string',
            'price' => 'required|numeric',
            'quantity' => 'required|integer'
        ]);

        $product = Product::create($data);

        return response()->json($product, 201);
    }

    // 3. Update product by ID
    public function update(Request $request, $id)
    {
        $product = Product::find($id);

        if (!$product) {
            return response()->json(['message' => 'Product not found'], 404);
        }

        $data = $request->validate([
            'name' => 'string',
            'description' => 'string',
            'price' => 'numeric',
            'quantity' => 'integer'
        ]);

        $product->update($data);

        return response()->json($product, 200);
    }

    // 4. Delete product by ID
    public function destroy($id)
    {
        $product = Product::find($id);

        if (!$product) {
            return response()->json(['message' => 'Product not found'], 404);
        }

        $product->delete();

        return response()->json(['message' => 'Product deleted successfully'], 200);
    }
}
