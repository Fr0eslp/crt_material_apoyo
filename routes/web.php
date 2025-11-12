<?php

use App\Http\Controllers\MaterialapoyoController;
use Illuminate\Support\Facades\Route;
use Laravel\Fortify\Features;
use Livewire\Volt\Volt;

Route::get('/', function () {
    return view('MaterialApoyo.index');
});

#Route::get('/', [MaterialapoyoController::class, 'index']) ->name('MaterialApoyo.index');


Route::resource('MaterialApoyo', MaterialApoyoController::class);
