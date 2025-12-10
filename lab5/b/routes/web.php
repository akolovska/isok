<?php

use App\Http\Controllers\EventController;
use App\Http\Controllers\OrganiserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Route::resource('organisers', OrganiserController::class);
Route::resource('events', EventController::class);

