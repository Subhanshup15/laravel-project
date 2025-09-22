<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use App\Http\Middleware\Chechage;
use App\Http\Middleware\ContryCheck;        

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware): void {
        // $middleware->append(Chechage::class);
       
$middleware->appendToGroup('sagar',[Chechage::class,ContryCheck::class]);
       

        
    })
    ->withExceptions(function (Exceptions $exceptions): void {
        //
    })->create();
