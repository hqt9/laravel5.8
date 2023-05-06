<?php

/**
 * Laravel - A PHP Framework For Web Artisans
 *
 * @package  Laravel
 * @author   Taylor Otwell <taylor@laravel.com>
 */

define('LARAVEL_START', microtime(true));

/*
|--------------------------------------------------------------------------
| Register The Auto Loader
|--------------------------------------------------------------------------
|
| Composer provides a convenient, automatically generated class loader for
| our application. We just need to utilize it! We'll simply require it
| into the script here so that we don't have to worry about manual
| loading any of our classes later on. It feels great to relax.
|
*/

// 载入 Composer 生成的自动加载设置
require __DIR__.'/../vendor/autoload.php';
// 执行完成后，不会加载任何类


/*
|--------------------------------------------------------------------------
| Turn On The Lights
|--------------------------------------------------------------------------
|
| We need to illuminate PHP development, so let us turn on the lights.
| This bootstraps the framework and gets it ready for use, then it
| will load up this application so that we can run it and send
| the responses back to the browser and delight our users.
|
*/

// 获取 Laravel 应用实例
$app = require_once __DIR__.'/../bootstrap/app.php';
/**
 * 执行完成后会加载以下类
    Illuminate\Foundation\Application
    Illuminate\Container\Container
    Illuminate\Contracts\Container\Container
    Psr\Container\ContainerInterface
    Illuminate\Contracts\Foundation\Application
    Symfony\Component\HttpKernel\HttpKernelInterface
    Illuminate\Foundation\PackageManifest
    Illuminate\Filesystem\Filesystem
    Illuminate\Support\Traits\Macroable
    Illuminate\Events\EventServiceProvider
    Illuminate\Support\ServiceProvider
    Illuminate\Support\Arr
    Illuminate\Log\LogServiceProvider
    Illuminate\Routing\RoutingServiceProvider
 */

/*
|--------------------------------------------------------------------------
| Run The Application
|--------------------------------------------------------------------------
|
| Once we have the application, we can handle the incoming request
| through the kernel, and send the associated response back to
| the client's browser allowing them to enjoy the creative
| and wonderful application we have prepared for them.
|
*/

/**
 * 初始化 HTTP 内核
 *
 */
$kernel = $app->make(Illuminate\Contracts\Http\Kernel::class);
/**
 * 执行完成后会加载以下类
App\Http\Kernel
Illuminate\Foundation\Http\Kernel
Illuminate\Contracts\Http\Kernel
Illuminate\Routing\Router
Illuminate\Contracts\Routing\Registrar
Illuminate\Contracts\Routing\BindingRegistrar
Illuminate\Events\Dispatcher
Illuminate\Contracts\Events\Dispatcher
Illuminate\Routing\RouteCollection
 */


// HTTP 内核处理 HTTP 请求：获取一个 Request，返回一个 Response，可以把该内核想象作一个代表整个应用的大黑盒子，输入 HTTP 请求，返回 HTTP 响应
$response = $kernel->handle(
    // 捕获用户请求
    $request = Illuminate\Http\Request::capture()
);

$response->send();

$kernel->terminate($request, $response);
