<?php

use App\Http\Controllers\api\SuratTugasController as ApiSuratTugasController;
use App\Http\Controllers\ApiDaftarController;
use App\Http\Controllers\LayananController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\SurattugasController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::post('login', [LoginController::class, 'loginApi']);
Route::post('daftar', [ApiDaftarController::class, 'daftarApi']);
// Route::get('layanan',[LayananController::class, 'dataLayanan'])->middleware('auth:sanctum');

Route::middleware(['auth:sanctum'])->group(function(){
    Route::get('layanan',[LayananController::class, 'dataLayanan']);

    // surat tugas
    Route::post('store/surat_tugas', [ApiSuratTugasController::class, 'storeSurattugas']);
    Route::post('update/surat_tugas/{id}', [ApiSuratTugasController::class, 'updateSurattugas']);
});
