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

// CRUD Agenda
Route::get('/agenda', [AgendaController::class, 'index']);         // GET semua data
Route::get('/agenda/{id}', [AgendaController::class, 'show']);     // GET detail data
Route::post('/agenda', [AgendaController::class, 'store']);        // POST tambah data
Route::put('/agenda/{id}', [AgendaController::class, 'update']);   // PUT update data
Route::delete('/agenda/{id}', [AgendaController::class, 'destroy']); // DELETE hapus data