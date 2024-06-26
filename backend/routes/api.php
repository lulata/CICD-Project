<?php

use App\Http\Controllers\NotesController;
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


Route::get('notes',                 [NotesController::class, 'index']);
Route::post('notes',                [NotesController::class, 'store']);
Route::post('notes/{note}',         [NotesController::class, 'update']);
Route::get('notes/{note}',          [NotesController::class, 'show']);
Route::delete('notes/{note}',       [NotesController::class, 'destroy']);
