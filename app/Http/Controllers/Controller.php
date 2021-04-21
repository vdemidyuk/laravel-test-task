<?php

namespace App\Http\Controllers;

use App\Services\AppService;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Auth;

class Controller extends BaseController
{
    public AppService $appService;

    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function __construct(AppService $appService)
    {
        $this->appService = $appService;
    }

    public function ping(): JsonResponse
    {
        return response()->json((object)['ping' => 'pong']);
    }

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
