<?php

use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CustomerController;

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

Route::group([
    'prefix' => 'v1',
  ], function () {
    Route::get('/', function () {
        return response()->json(['message' => 'Customer API', 'status' => 'Connected']);
    });
    Route::apiResource('customer', CustomerController::class);
  });

Route::get('/', function () {
    return redirect('api');
});
