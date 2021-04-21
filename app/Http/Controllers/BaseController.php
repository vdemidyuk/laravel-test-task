<?php

namespace App\Http\Controllers;

use App\Services\AppService;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller;

class BaseController extends Controller
{
    public AppService $appService;

    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function __construct(AppService $appService)
    {
        $this->appService = $appService;
    }

}
