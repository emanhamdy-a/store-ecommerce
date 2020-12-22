<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/adminx', function () {
    // return view('layouts.admin');
});
