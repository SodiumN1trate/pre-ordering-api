<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\ColorRequest;
use App\Http\Resources\ColorResource;
use App\Http\Resources\ProductResource;
use Illuminate\Http\Request;
use App\Models\Color;

class ColorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function index(Request $request)
    {
        return ColorResource::collection(Color::filter($request->all())->get());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(ColorRequest $request)
    {
        $color = Color::create($request->validated());
        return response()->json([
            'message' => [
                'type' => 'success',
                'data' => 'Color added',
            ],
            'data' => new ColorResource($color),
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return ColorResource
     */
    public function show(Color $color)
    {
        return new ColorResource($color);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(ColorRequest $request, Color $color)
    {
        $color->update($request->validated());
        return response()->json([
            'message' => [
                'type' => 'success',
                'data' => 'Color updated',
            ],
            'data' => new ColorResource($color),
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy(Color $color)
    {
        $color->delete();
        return response()->json([
            'message' => [
                'type' => 'success',
                'data' => 'Color deleted',
            ],
            'data' => new ColorResource($color),
        ]);
    }
}
