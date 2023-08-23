<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ListController extends Controller
{
    public function index() 
    {
        return response()->json([
            'message' => "hello"
        ]);
    }
}
