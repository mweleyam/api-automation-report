<?php

use App\Http\Controllers\Api\AutomationController;
use App\Http\Controllers\Api\ChartController;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('automations', [AutomationController::class, 'index']);
Route::post('automations', [AutomationController::class, 'store']);
Route::get('automations/{id}', [AutomationController::class, 'show']);
Route::get('automations/{id}/edit', [AutomationController::class, 'edit']);
Route::put('automations/{id}/edit', [AutomationController::class, 'update']);
Route::delete('automations/{id}/delete', [AutomationController::class, 'destroy']);

Route::get('charts/total_schenario', [ChartController::class,'total_scenario']);


