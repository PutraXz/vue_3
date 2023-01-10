<?php

use App\Http\Controllers\API\Admin\DeleteFurniture;
use App\Http\Controllers\API\Admin\EditFurniture;
use App\Http\Controllers\API\Admin\ShowFurniture as AdminShowFurniture;
use App\Http\Controllers\API\Admin\UpdateFurniture;
use App\Http\Controllers\API\Admin\UploadFurniture;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\API\User\DetailFurniture as UserDetailFurniture;
use App\Http\Controllers\API\User\ShowFurniture as UserShowFurniture;

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
Route::post('/store', UploadFurniture::class);
Route::get('show', UserShowFurniture::class);
Route::get('/show/{slug}', UserDetailFurniture::class);
Route::get('/dataFurniture', AdminShowFurniture::class);
Route::post('/dataFurniture/store/{slug}', UpdateFurniture::class);
Route::get('/dataFurniture/edit/{slug}', EditFurniture::class);
Route::delete('/dataFurniture/delete/{slug}', DeleteFurniture::class);