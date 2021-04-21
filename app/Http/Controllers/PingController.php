<?php

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;

class PingController extends BaseController
{
    public function ping(): JsonResponse
    {
        return response()->json((object)['ping' => 'pong']);
    }
}
