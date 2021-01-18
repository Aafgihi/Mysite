<?php

namespace App\Http\Middleware;

use Closure;

class check
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $today = date('D');

        IF($today != 'Mon'){

            return redirect()->to('close');

        }
        return $next($request);
    }
}
