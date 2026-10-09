<?php

use App\Http\Controllers\Api\V1\CompanyController;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:sanctum')->group(function () {
    Route::post('/companies/store', [CompanyController::class, 'store']);
});

Route::get('/companies', [CompanyController::class, 'index']);