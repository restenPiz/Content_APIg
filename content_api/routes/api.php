<?php

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

//*Inicio das rotas da api
Route::get('/store', [fileController::class, 'storeFile'])->name('store');
Route::get('/update/{id}', [fileController::class, 'updateFile'])->name('update');
Route::get('/delete/{id}', [fileController::class, 'deleteFile'])->name('delete');
Route::get('/allFile', [fileController::class, 'allFile'])->name('all');

