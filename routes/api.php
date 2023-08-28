<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
# import
use App\Http\Controllers\ClientController;
use App\Http\Controllers\ServiceController;

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


#Route::(PostMan) http://127.0.0.1:8000/api/clients/
Route::prefix('/clients')->group(function () {
    Route::get('/',[ClientController::class, 'index']);
    Route::post('/',[ClientController::class, 'store']);
    Route::get('/{id}',[ClientController::class, 'show']);
    Route::put('/{id}',[ClientController::class, 'update']);
    Route::delete('/{id}',[ClientController::class, 'destroy']);
});

#Route::(PostMan) http://127.0.0.1:8000/api/services/
Route::prefix('/services')->group(function () {
    Route::get('/',[ServiceController::class, 'index']);
    Route::post('/',[ServiceController::class, 'store']);
});
