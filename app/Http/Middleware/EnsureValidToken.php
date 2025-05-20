<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Mockery\Exception\InvalidOrderException;
use Symfony\Component\HttpFoundation\Response;

class EnsureValidToken
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if($request->query('token') !== '123456'){
            throw new InvalidOrderException("Error Processing Request", 1);
            
        }
        return $next($request);
    }
}
