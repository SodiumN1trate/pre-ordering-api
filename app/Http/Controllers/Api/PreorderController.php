<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\PreorderRequest;
use App\Http\Resources\PreorderResource;
use App\Models\Color;
use App\Models\Preorder;
use App\Models\Symbol;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PreorderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function index()
    {
        return PreorderResource::collection(Preorder::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(PreorderRequest $request)
    {
        $validated = $request->validated();
        $validated['unique_code'] = Str::random(10);
        $validated['status_id'] = 1;
        $preorder = Preorder::create($validated);
        foreach($request->products as $value) {
            $preorder->products()->attach($value['product_id'], [
                'symbol' => Symbol::find($value['symbol_id'])->image,
                'color' => Color::find($value['color_id'])->color,
            ]);
        }
        return  response()->json([
            'message' => [
                'type' => 'success',
                'data' => 'Pre-order added',
            ],
            new PreorderResource($preorder),
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return PreorderResource
     */
    public function show(Preorder $preorder)
    {
        return new PreorderResource($preorder);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(PreorderRequest $request, Preorder $preorder)
    {
        $validated = $request->validated();
        $validated['unique_code'] = Str::random(10);
        $validated['status_id'] = 1;
        $preorder->update($validated);
        foreach($request->products as $value) {
            $preorder->products()->attach($value['product_id'], [
                'symbol' => Symbol::find($value['symbol_id'])->image,
                'color' => Color::find($value['color_id'])->color,
            ]);
        }
        return  response()->json([
            'message' => [
                'type' => 'success',
                'data' => 'Pre-order updated',
            ],
            new PreorderResource($preorder),
        ]);
    }
}
