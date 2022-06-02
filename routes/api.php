<?php

use App\Http\Controllers\API\FixtureController;
use App\Http\Controllers\API\TeamController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::get('/teams', [TeamController::class, 'index']);

Route::get('/fixtures', [FixtureController::class, 'index']);
Route::post('/fixtures/edit', [FixtureController::class, 'edit']);