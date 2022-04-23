<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductCategoryController;
use App\Http\Controllers\ProductController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
// product controller
Route::get('product/list',[ProductController::class, 'index']);
Route::post('product/add',[ProductController::class, 'store']);
Route::get('product/show/{id}',[ProductController::class, 'show']);
Route::put('product/update/{id}',[ProductController::class, 'update']);
Route::delete('product/delet/{id}',[ProductController::class, 'destroy']);

//category controller
Route::get('category/list',[ProductCategoryController::class, 'index']);
Route::post('category/add',[ProductCategoryController::class, 'store']);
Route::put('category/update/{id}',[ProductCategoryController::class, 'update']);
Route::delete('category/delete/{id}',[ProductCategoryController::class, 'destroy']);


// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });
