<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('Home/home');
})->name('home');

Route::get('/demo', function () {
    return view('demo');
})->name('home');

