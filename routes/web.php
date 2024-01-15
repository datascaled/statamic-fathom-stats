<?php

use App\Http\Controllers\VideoController;
use Datascaled\FathomStats\Http\Controllers\AggregationController;
use Datascaled\FathomStats\Http\Controllers\SitesController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::get('/fathom/sites/{site}', [SitesController::class, 'show']);
Route::get('/fathom/sites/{site}/aggregations', [AggregationController::class, 'index']);
