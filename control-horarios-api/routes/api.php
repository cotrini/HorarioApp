<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ScheduleController;
use App\Http\Controllers\AttendanceController;
use App\Http\Controllers\WorkSummaryController;
use App\Http\Controllers\AuthController;

Route::post('/login',    [AuthController::class, 'login']);
// Route::post('/register', [AuthController::class, 'register']);

Route::middleware('auth:sanctum')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::apiResource('users', UserController::class);
    Route::apiResource('schedules', ScheduleController::class);
    Route::apiResource('attendances', AttendanceController::class);
    Route::apiResource('work-summaries', WorkSummaryController::class);
});

