<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::post('/posts', function(\Illuminate\Http\Request $request) {

    $post = \Illuminate\Support\Facades\Auth::user()?->posts()->create($request->all());

    return new \Illuminate\Http\JsonResponse($post, 201);
})->middleware('auth');
