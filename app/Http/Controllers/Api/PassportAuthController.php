<?php

namespace App\Http\Controllers\Api;

use App\Models\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Exception;

class PassportAuthController extends Controller
{
    //

    public function login(Request $request)
    {
        $data = [
            'email' => $request->email,
            'password' => $request->password
        ];

        if (auth()->attempt($data)) {
            $token = auth()->user()->createToken('BaliTowerIndo')->accessToken;
            return response()->json(
                [
                    'token' => $token,
                    'data' => auth()->user(),
                    'message' => 'success'
                ],
                200
            );
        } else {
            return response()->json(['error' => 'Unauthorized'], 401);
        }
    }

    public function userInfo()
    {
        try {
            $user = auth()->user();
            return response()->json(['user' => $user], 200);
        } catch (Exception $e) {

            return response()->json(['user' => $e->getMessage()], 500);
        }
    }
}
