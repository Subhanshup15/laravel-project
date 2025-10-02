<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class EnsureUserHasCart
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        return $next($request);
    }
}
/*
To use this middleware, register it in your `app/Http/Kernel.php` file, either in the `$middleware` array (for global use) or in the `$routeMiddleware` array (for specific routes).

Example for route middleware:
protected $routeMiddleware = [
    // ...
    'ensure.cart' => \App\Http\Middleware\EnsureUserHasCart::class,
];

Then, apply it to routes or controllers like this:
Route::middleware(['ensure.cart'])->group(function () {
    // Protected routes here
});
*/