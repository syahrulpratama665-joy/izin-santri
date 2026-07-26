<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/test-login', function () {
    return [
        'user' => Auth::user(),
        'check' => Auth::check(),
    ];
});