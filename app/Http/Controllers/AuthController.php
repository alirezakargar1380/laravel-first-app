<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;

class AuthController extends Controller
{
    //
    public function index()
    {
        $user = User::create([
            'name' => 'alireza',
            'email' => 'alirezak@gmail.com',
            'password' => bcrypt('12345678')
        ]);

        return response()->json([
            'm' => 'saved',
            'data' => $user
        ]);
    }

    public function login(Request $req)
    {
        $credentials = request(['email', 'password']);
        if (!auth()->attempt($credentials)) {
            return response()->json([
                'm' => 'false'
            ]);
        }

        $user = User::where('email', $req->email)->first();

        return response()->json([
            'm' => 'saved',
            'token' => $user->createToken('auth-token')->plainTextToken
        ]);
    }
}