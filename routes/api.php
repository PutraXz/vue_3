<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\API\Furniture\DetailFurniture;
use App\Http\Controllers\API\Furniture\FurnitureItems;
use App\Http\Controllers\API\Furniture\ShowFurniture;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::post('/register', [AuthController::class,'register']);
Route::post('/login', [AuthController::class, 'login']);
Route::post('/store', FurnitureItems::class);
Route::get('show', ShowFurniture::class);
Route::get('/show/{slug}', DetailFurniture::class);
