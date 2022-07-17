<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function user() {
        return auth()->user();
    }

    public function login(Request $request) {
        $validated = $request->validate([
           'username' => 'required',
           'password' => 'required',
        ]);

        if(Auth::attempt($validated)){
            return response()->json( [
                'message' => [
                    'type' => 'success',
                    'message' => 'Successfully authenticated!'
                ],
                'user' => auth()->user(),
                'access_token' => auth()->user()->createToken('login')->accessToken,
            ]);
        }
        return response()->json([
            'message' => [
                'type' => 'error',
                'message' => 'User does not exist'
            ]
        ], 400);
    }
}
