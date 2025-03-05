<?php

use App\Http\Controllers\LeadController;
use App\Http\Controllers\AuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::post("/logout",[AuthController::class,"logout"])->middleware('auth:sanctum');
Route::post("/login",[AuthController::class,"login"]);


Route::post('/lead', [LeadController::class,'createLead']);
Route::get("/leads",[LeadController::class,'getPageOfLeads'])->middleware('auth:sanctum');
Route::get('/lead/{lead_id}', [LeadController::class,'getLead'])->middleware('auth:sanctum');

