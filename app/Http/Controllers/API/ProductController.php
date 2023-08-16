<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreProductRequest;
use App\Http\Resources\ProductResource;
use App\Models\Product;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Store a newly created product in the database.
     *
     * @param  \App\Http\Requests\StoreProductRequest  $request
     * @return \Illuminate\Http\JsonResponse
     */

    public function store(StoreProductRequest $request) : JsonResponse
    {
        $product = Product::create($request->validated());
        return response()->json([
            'status' => 'success',
            'data' => new ProductResource($product)
        ], 201);
    }

    /**
     * Check if the product is expired.
     *
     * @param  int  $id
     * @return JsonResponse
     */
    public function isExpired(int $id): JsonResponse
    {
        $product = Product::findOrFail($id);
        $isExpired = now()->greaterThan($product->expiration_date);
        return response()->json(['status' => 'success', 'data' => ['is_expired' => $isExpired]]);
    }

    /**
     * Check if the product is in stock and return its type.
     *
     * @param  int  $id
     * @return JsonResponse
     */
    public function isInStock(int $id): JsonResponse
    {
        $product = Product::with('productType')->findOrFail($id);
        $isInStock = $product->amount > 0;
        return response()->json([
            'status' => 'success',
            'data' => [
                'is_in_stock' => $isInStock,
                'product_type' => $product->productType->title
            ]
        ]);
    }


    /**
     * Update the specified product in the database.
     *
     * @param  StoreProductRequest  $request
     * @param  int  $id
     * @return JsonResponse
     */
    public function update(StoreProductRequest $request, int $id): JsonResponse
    {
        $product = Product::findOrFail($id);
        $product->update($request->validated());
        return response()->json([
            'status' => 'success',
            'data' => new ProductResource($product)
        ]);
    }

}
