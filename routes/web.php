<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::post('/posts', function() {
    return new \Illuminate\Http\JsonResponse(['created' => true], 201);
})->middleware('auth');
