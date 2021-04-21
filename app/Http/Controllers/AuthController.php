<?php

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends BaseController
{
    public function auth(Request $request): JsonResponse
    {
        $validate = [
            'login' => [
                'required',
            ],
            'password' => [
                'required',
            ],
        ];

        $request->validate($validate);

        $result = $this->appService->auth($request);

        if(!$result) {
            return response()->json(['message' => 'Invalid Credentials'], 401);
        }

        sleep(2);

        return response()->json((object)['token' => $result]);
    }
}
