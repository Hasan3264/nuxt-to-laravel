<?php

use App\Http\Controllers\productController;
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
Route::get('view',[productController::class, 'listProduct']);
Route::get('view/{id}',[productController::class, 'listProductByid']);
Route::post('insert',[productController::class, 'insert']);
Route::put('update/{id}',[productController::class, 'update']);
Route::delete('delete/{id}',[productController::class, 'delete']);
