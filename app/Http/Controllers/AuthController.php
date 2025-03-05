<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    function logout(){
        session()->flush();
        return response()->json(["message"=>"Admin logged out successfully!"]);
    }
    function login(Request $request){
        $credentials = $request->validate([
            "email"=>["required", "email"],
            "password" => ["required"],
        ]);
        $is_authenticated = Auth::attempt($credentials);
        if ($is_authenticated) {
            return response()->json([
                "token" => session()->get("_token"),
            ]);
        }
    
        return response()->json([
            "message"=>"The provided credentials does not match a valid administrator",
        ], Response::HTTP_UNAUTHORIZED);
    }
}
