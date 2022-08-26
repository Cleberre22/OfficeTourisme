<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\API\EventsController;
use App\Http\Controllers\API\PlacesController;
use App\Http\Controllers\API\ArticlesController;
use App\Http\Controllers\API\ContactsController;
use App\Http\Controllers\API\PlaceTypesController;
use App\Http\Controllers\API\EventTypesController;

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

Route::apiResource("articles", ArticlesController::class);
Route::apiResource("contacts", ContactsController::class);
Route::apiResource("place_types", PlaceTypesController::class);
Route::apiResource("places", PlacesController::class);
Route::apiResource("events", EventsController::class);
Route::apiResource("event_types", EventTypesController::class);

Route::post('/auth/register', [AuthController::class, 'createUser']);
Route::post('/auth/login', [AuthController::class, 'loginUser']);

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
