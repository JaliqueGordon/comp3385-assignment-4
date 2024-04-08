<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MovieController;


Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


Route::prefix('v1')->group(function (){
    Route::get('/movies', [MovieController::class, 'index']);
    Route::post('/movies', [MovieController::class, 'store']);
});
