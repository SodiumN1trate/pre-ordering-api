<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\NavigationRequest;
use App\Http\Resources\NavigationResource;
use App\Models\Navigation;
use Illuminate\Http\Request;

class NavigationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function index()
    {
        return NavigationResource::collection(Navigation::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(NavigationRequest $request)
    {
        $navigation = Navigation::create($request->validated());
        return response()->json([
            'message' => [
                'type' => 'success',
                'data' => 'Navigation created',
            ],
            'data' => new NavigationResource($navigation),
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return NavigationResource
     */
    public function show(Navigation $navigation)
    {
        return new NavigationResource($navigation);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(NavigationRequest $request, Navigation $navigation)
    {
        $navigation->update($request->validated());
        return response()->json([
            'message' => [
                'type' => 'success',
                'data' => 'Navigation updated',
            ],
            'data' => new NavigationResource($navigation),
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy(Navigation $navigation)
    {
        $navigation->delete();
        return response()->json([
            'message' => [
                'type' => 'success',
                'data' => 'Navigation deleted',
            ],
            'data' => new NavigationResource($navigation),
        ]);
    }
}
