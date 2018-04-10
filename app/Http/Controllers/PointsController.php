<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Point;

class PointsController extends Controller
{
    public function store()
    {
        request()->validate([
            'category_id' => 'required|exists:categories,id'
        ]);

        $point = Point::create(request()->all());

        return $point;
    }
}
