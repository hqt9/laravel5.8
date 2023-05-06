<?php

use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

/**
 * 通过接口方式触发任务
 * \Illuminate\Console\Command
 */
Route::get('/test', function () {
    $exitCode = Artisan::call('command:test');
});

use Illuminate\Support\Facades\Cache;
Route::get('/cache', function () {
    return Cache::get('key');
});


Route::get('3', function () {
    return 'OK';
});

Route::get('2', 'TestController@index');

Route::get('1', function () {
    echo 1 . PHP_EOL;
    echo 2 . PHP_EOL;
    // trigger_error('b', E_ALL);
    echo 3 . PHP_EOL;
    echo 4 . PHP_EOL;
});
