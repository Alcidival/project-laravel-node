<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Http;

Route::apiResource('users', UserController::class);

Route::get('/health', function () {
    return response()->json(['status' => 'ok']);
});

Route::get('/external', function () {
    $response = Http::get('https://localhost:3000/external');
    return response()->json($response->json());
});