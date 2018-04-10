<?php

namespace App\Http\Controllers;

use App\Category;
use App\Point;

class AppController extends Controller
{
    public function index()
    {
        $data = [
            'categories' => Category::all(),
            'points' => Point::all(),
        ];

        return request()->wantsJson()
            ? response()->json(['data' => $data])
            : view('index', $data);
    }
}
