<?php
/**
 * Created by PhpStorm.
 * User: heqingtao
 * Date: 2023/3/16 14:09
 */

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Cache;
use Illuminate\Cache\CacheManager;

class TestController extends Controller
{
    public function getMiddleware(): array
    {
        // $this->middleware('dddddd');
        return parent::getMiddleware();
    }

    public function index()
    {
        // $request = app('request');
        // $request = app(\Illuminate\Http\Request::class);
        // // $request->flush();
        //
        // $request = request();
        // // $request->is();

        // var_dump(Cache::get('s', 1));
        // echo ' TEST ';

        // return response()->jsonp();
    }
}
