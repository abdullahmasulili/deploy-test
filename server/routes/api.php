<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ResellerController;
use App\Http\Controllers\KotaController;

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

//public routes



//end of public routes

//protected routes



//end of public routes



Route::resource('kota', KotaController::class);
// Route::resource('provinsi');
Route::resource('reseller', ResellerController::class);
Route::get('reseller/search/{nama}', [ResellerController::class, 'searchName']);
Route::get('reseller/filter/', [ResellerController::class, 'getCreateYear']);
Route::get('reseller/active/count', [ResellerController::class, 'activeMember']); 
Route::get('reseller/unactive/count', [ResellerController::class, 'unactiveMember']); 
//Route::get('reseller/search/{telepon}', [ResellerController::class, 'searchPhone']); //search by id

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
