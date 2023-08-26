<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Lists;
use Illuminate\Support\Facades\Validator;

class ListController extends Controller
{
    public function index()
    {
        $books = Lists::all();
        return response()->json($books);
    }

    public function create(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:255',
            'author' => 'required',
            'test' => 'required'
        ]);

        if ($validator->fails()) {
            $error = $validator->messages()->toJson();
            return response()->json([
                'm' => 'saved',
                'test' => $error
            ]);
        }

        $saved = Lists::create([
            'name' => $request->name,
            'author' => $request->author,
            'test' => $request->test
        ]);

        return response()->json([
            'm' => 'saved',
            'data' => $saved
        ]);
    }
}