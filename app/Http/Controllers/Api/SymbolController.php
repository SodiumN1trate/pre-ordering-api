<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\SymbolRequest;
use App\Http\Resources\ProductResource;
use App\Http\Resources\SymbolResource;
use App\Models\Product;
use App\Models\Symbol;
use Illuminate\Http\Request;

class SymbolController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function index()
    {
        return SymbolResource::collection(Symbol::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(SymbolRequest $request)
    {
        $validated = $request->validated();
        $file = $validated['image'];
        $validated['image'] = $file->hashName();
        $file->store('symbols');
        $symbol = Symbol::create($validated);
        return response()->json([
            'message' => [
                'type' => 'success',
                'data' => 'Symbol added',
            ],
            'data' => new SymbolResource($symbol),
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return SymbolResource
     */
    public function show(Symbol $symbol)
    {
        return new SymbolResource($symbol);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(SymbolRequest $request, Symbol $symbol)
    {
        $symbol->update($request->validated());
        return response()->json([
            'message' => [
                'type' => 'success',
                'data' => 'Symbol updated',
            ],
            'data' => new SymbolResource($symbol),
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy(Symbol $symbol)
    {
        $symbol->delete();
        return response()->json([
            'message' => [
                'type' => 'success',
                'data' => 'Symbol deleted',
            ],
            'data' => new SymbolResource($symbol),
        ]);
    }
}
