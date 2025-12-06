<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Helpers\ApiResponse;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $products = Product::all();
        return ApiResponse::success($products);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|numeric|min:0',
        ]);
        $product = Product::create($request->all());
        return ApiResponse::success($product, "Product created successfully", 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(String $id)
    {
        //
        $product = Product::find($id);
        if (!$product) {
            return ApiResponse::error("Product not found", 404);
        }
        return ApiResponse::success($product, "Product retrieved successfully", 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, String $id)
    {
        //
        $product = Product::find($id);
        if (!$product) {
            return ApiResponse::error("Product not found", 404);
        }
        $request->validate([
            'name' => 'sometimes|required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'sometimes|required|numeric|min:0',
        ]);
        $product->update($request->all());
        return ApiResponse::success($product, "Product updated successfully", 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(String $id)
    {
        //
        $product = Product::find($id);
        if (!$product) {
            return ApiResponse::error("Product not found", 404);
        }
        $product->delete();
        return ApiResponse::success(null, "Product deleted successfully", 200);
    }
}
