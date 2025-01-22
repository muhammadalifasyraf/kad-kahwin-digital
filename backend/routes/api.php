<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\SsoProviderController;
use Illuminate\Support\Facades\Route;

// Auth
Route::get('/me', [AuthController::class, 'me'])->middleware('auth:sanctum');
Route::post('auth/register', [AuthController::class, 'register']);
Route::post('auth/login', [AuthController::class, 'login']);
Route::post('auth/logout', [AuthController::class, 'logout'])->middleware('auth:sanctum');

// googleoAuth
Route::get('auth/google', [SsoProviderController::class, 'googleLogin']);
Route::get('auth/google/redirect', [SsoProviderController::class, 'googleRedirect']);

// Roles
Route::apiResource('roles', RoleController::class);
Route::delete('roles/{role}', [RoleController::class, 'delete']);
Route::put('roles/{role}/restore', [RoleController::class, 'restore']);

// TODO: Migrate table according to prisma.schema