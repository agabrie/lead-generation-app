<?php

use Illuminate\Support\Facades\Route;
Route::middleware('auth:sanctum')->get('/admin', function () {
    return view('admin');
});

Route::get('/admin/login', function(){
    return view('main');
})->name('login');

Route::get('/{vue_page?}', function () {
    return view('main', [
        "maps_api_key"=> config('app.google.maps'),
    ]);
})->where('vue_page', '[\/\w\.-]*');