<?php

use App\Http\Controllers\UserController;
use App\Http\Controllers\ExternalServiceController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Http;

Route::apiResource('users', UserController::class);

Route::post('/users', [UserController::class, 'postUser'])->name('users.post');

Route::get('/users/{id}', [UserController::class, 'getUser'])->name('users.get');

Route::put('/users/{id}', [UserController::class, 'updateUser'])->name('users.update');

Route::delete('/users/{id}', [UserController::class, 'deleteUser'])->name('users.delete');

Route::get('/health', function () {
    return response()->json(['status' => 'ok']);
});

Route::get('/external', [ExternalServiceController::class, 'getExternalData']);

