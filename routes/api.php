<?php

use Illuminate\Http\Request;
use App\Http\Controllers\ApiProduto;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApiCategoria;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Api\LoginController;
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
Route::group(['middleware' => ['guest:api']], function()
{
    Route::post('user/create', 'UserController@create');
});

Route::group(['middleware' => 'auth:api'], function()
{
    Route::apiResource('produto', ApiProduto::class);
    Route::apiResource('categoria', ApiCategoria::class);

    //User
    Route::post('update', [UserController::class, 'update'])->name('update.user');
    Route::post('delete', [UserController::class, 'delete'])->name('delete.user');
    Route::get('show', [UserController::class, 'show'])->name('show.user');

    //Login
    Route::post('login', [LoginController::class, 'login'])->name('login.user');
    Route::post('logout', [LoginController::class, 'logout'])->name('logout.user');
});
