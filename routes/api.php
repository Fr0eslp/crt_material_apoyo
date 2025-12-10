<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\MaterialApoyosController;

// Forzar que todas las peticiones API acepten JSON
Route::middleware(['api'])->group(function () {
    // Rutas de API para Material de Apoyo
    Route::apiResource('materialapoyo', MaterialApoyosController::class);
});
