<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class isAdmin
{
    public function handle(Request $request, Closure $next)
    {

        if(auth()->guest() || !auth()->user()->is_admin) {
            return response()->json(['message' => 'Data not found'], 404);
        }

        return $next($request);
    }
}
