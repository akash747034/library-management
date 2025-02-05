<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Config;

class FormKeyMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
      
        $token = $request->header('APP_KEY_TOKEN');

    if ($token != Config::get('constant.api.APP_KEY_TOKEN')) {
      return response()->json('App key not found');
    }
        return $next($request);
    }
}
