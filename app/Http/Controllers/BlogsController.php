<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Service\BlogsService;

class BlogsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        try {
            $param = $request->all();
            $param['page'] = $param['page'] ?? 1;
            $param['pageSize'] = $param['pageSize'] ?? 10;
            $result = BlogsService::list($param);

            return ['code' => 200, 'message' => 'Success', 'data' => $result];
        } catch (\Exception $e) {
            return ['code' => 0, 'message' => 'Fail'];
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $param = $request->all();

        $file = $request->file('images');
        if (!empty($file) && $file->getClientOriginalName() != $param['image'])
            $param['image'] = BlogsService::upload($file);

        // return $param;
        $result = BlogsService::store($param);
        return ['code' => $result ? 200 : 0, 'message' => $result ? 'Success' : 'Fail'];
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        $param = $request->all();
        $result = BlogsService::destroy($param);
        return ['code' => $result ? 200 : 0, 'message' => $result ? 'Success' : 'Fail'];
    }
}
