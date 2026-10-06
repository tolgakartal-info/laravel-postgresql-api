<?php
// routes/api.php
use Illuminate\Support\Facades\Route;

// Otomatik olarak /api ön eki ile başlar, burası /api/v1/... olur
Route::prefix('v1')->group(base_path('routes/api/v1.php'));