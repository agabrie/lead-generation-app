<?php

use Illuminate\Support\Facades\Route;

Route::get('/{vue_page?}', function () {
    return view('main', [
        "maps_api_key"=> config('app.google.maps'),
    ]);
})->where('vue_page', '[\/\w\.-]*');