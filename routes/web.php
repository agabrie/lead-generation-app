<?php

use App\Models\Lead;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/admin/login', function(Request $request){
    if ($request->user()) {
        return redirect('/admin');
    }
    return view('main');
})->name('login');

Route::middleware('auth:sanctum')->get('/admin/{admin_page?}', function () {
    return view('admin');
})->where('admin_page', '[\/\w\.-]*');;

Route::get('/{vue_page?}', function () {
    return view('main', [
        "maps_api_key"=> config('app.google.maps'),
    ]);
})->where('vue_page', '[\/\w\.-]*');