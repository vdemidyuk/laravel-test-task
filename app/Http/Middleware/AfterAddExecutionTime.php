<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class AfterAddExecutionTime
{
    /**
     * Handle an outgoing :-) request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        return $next($request)->header(
            'X-Execution-Time',
            sprintf("%.2f", (microtime(true) - LARAVEL_START))
        );
    }
}
