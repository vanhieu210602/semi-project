<?php
namespace App\Http\Middleware;
use Closure;
class checkAdmin
{
    public function handle($request, Closure $next)  {
        return $next($request);
    }
}
