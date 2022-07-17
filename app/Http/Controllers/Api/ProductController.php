<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductRequest;
use App\Http\Resources\ProductResource;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function index()
    {
        return ProductResource::collection(Product::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(ProductRequest $request)
    {
        $validated = $request->validated();
        $file = $validated['image'];
        $validated['image'] = $file->hashName();
        $file->store('products');
        $product = Product::create($validated);
        return response()->json([
            'message' => [
                'type' => 'success',
                'data' => 'Product added',
            ],
            'data' => new ProductResource($product),
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return ProductResource
     */
    public function show(Product $product)
    {
        return new ProductResource($product);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(ProductRequest $request, Product $product)
    {
        $product->update($request->validated());
        return response()->json([
            'message' => [
                'type' => 'success',
                'data' => 'Product updated',
            ],
            'data' => new ProductResource($product),
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy(Product $product)
    {
        if($product->preorders->count() > 0) {
            return response()->json([
                'message' => [
                    'type' => 'error',
                    'data' => 'Product attached to pre-order',
                ],
                'data' => new ProductResource($product),
            ]);
        }

        $product->delete();
        return response()->json([
            'message' => [
                'type' => 'success',
                'data' => 'Product deleted',
            ],
            'data' => new ProductResource($product),
        ]);
    }

}
