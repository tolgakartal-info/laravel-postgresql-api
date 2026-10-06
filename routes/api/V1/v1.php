<?php

use App\Http\Controllers\Api\V1\CompanyController;
use Illuminate\Support\Facades\Route;

Route::post('/companies', [CompanyController::class, 'store']);