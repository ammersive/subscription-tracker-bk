<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
// use App\Http\Controllers\Subscriptions;
use App\Http\Controllers\API\Subscriptions;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/subscriptions', [Subscriptions::class, "index"]);
Route::post('/subscriptions', [Subscriptions::class, "store"]);

Route::get('/subscriptions/{subscription}', [Subscriptions::class, "show"]);
Route::put('/subscriptions/{subscription}', [Subscriptions::class, "update"]);
Route::delete('/subscriptions/{subscription}', [Subscriptions::class, "destroy"]);

