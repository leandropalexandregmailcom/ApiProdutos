<?php

use Illuminate\Http\Request;
use App\Http\Controllers\ApiProduto;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApiCategoria;

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

Route::group(['middleware' => 'auth:api'], function()
{
    Route::apiResource('produto', ApiProduto::class);
    Route::apiResource('categoria', ApiCategoria::class);

    Route::post('logout', 'Api\LoginController@logout');
});
