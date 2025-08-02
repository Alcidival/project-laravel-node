<?php

use Illuminate\Support\Facades\Route;

Route::apiResource('users', UserController::class);

Route::get('/health', function () {
    return response()->json(['status' => 'ok']);
});
