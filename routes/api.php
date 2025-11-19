<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AgendaController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
| Semua route API ada di sini.
| Otomatis menggunakan prefix "/api".
|--------------------------------------------------------------------------
*/

// Route default Sanctum (boleh biarkan)
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::get('/agenda', [AgendaController::class, 'index']);
Route::get('/agenda/{id}', [AgendaController::class, 'show']);
Route::post('/agenda', [AgendaController::class, 'store']);
Route::put('/agenda/{id}', [AgendaController::class, 'update']);
Route::delete('/agenda/{id}', [AgendaController::class, 'destroy']);
