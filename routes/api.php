<?php

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\API\PlaceController;
use App\Http\Controllers\API\ArticleController;
use App\Http\Controllers\API\ContactsController;
use App\Http\Controllers\API\Places_TypeController;

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

Route::apiResource("article", ArticleController::class);
Route::apiResource("contacts", ContactsController::class);
Route::apiResource("places_type", Places_TypeController::class);
Route::apiResource("places", PlaceController::class);
Route::apiResource("contacts", ContactsController::class);
Route::apiResource("contacts", ContactsController::class);
Route::apiResource("contacts", ContactsController::class);

Route::post('/auth/register', [AuthController::class, 'createUser']);
Route::post('/auth/login', [AuthController::class, 'loginUser']);

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
