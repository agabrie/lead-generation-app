<?php

use Illuminate\Support\Facades\Route;

Route::get('/{vue_page?}', function () {
    return view('main');
})->where('vue_page', '[\/\w\.-]*');