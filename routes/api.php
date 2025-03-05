<?php

use App\Http\Controllers\LeadController;
use App\Http\Middleware\AdminAuthentication;
use App\Models\Lead;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::post("/logout",function(){
    session()->flush();
    return response()->json(["message"=>"Admin logged out successfully!"]);
});

Route::post("/login",function(Request $request){
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
});

Route::get("/leads",function(Request $request){
    $leads = Lead::paginate(5);

    return response()->json([
        "leads"=>$leads,
    ]);
})->middleware(AdminAuthentication::class);

Route::post('/lead', [LeadController::class,'createLead']);

