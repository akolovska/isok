<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Route::resource('categories', \App\Models\Category::class);
Route::resource('recipes', \App\Models\Recipe::class);
